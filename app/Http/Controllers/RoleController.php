<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Permission;
use App\Models\RolePermission;

class RoleController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $role_list = new Role();
        $role_list = $role_list->orderBy('role_name')->paginate(10);
        if (request()->wantsJson()) {
            return RoleResource::collection($role_list);
        }
        return view('role.index')
            ->with('role_list', $role_list);
    }

    // Search result.
    public function search(Request $request)
    {
        $role_list = new Role();
        if ($request->filled('search')) {
            $role_list = $role_list->where('role_name', 'LIKE', "%{$request->search}%")->orderBy('role_name')->paginate(10);
        }
        return view('role.index')
            ->with('role_list', $role_list)
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $this->updateControllersList();
        $this->attachAdminPermissions();
        $permissions = Permission::select('permission_id', 'permission_name', 'controller', 'method')->orderBy('controller')->get();
        return view('role.create')
            ->with(compact('permissions'));
    }

    // Store a newly created resource in storage.
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            'role_name' => $request->role_name,
            'description' => $request->description,
            'display_seq' => $request->display_seq,
        ]);

        if (!$role) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding Role.');
        } else {
            // Add terminals
            foreach ($request->input('permission_id') as $pid) {
                $role_permission['role_id'] = $role->role_id;
                $role_permission['permission_id'] = $pid;
                RolePermission::create($role_permission);
            }
        }

        return redirect()->route('role.index')->with('success', 'Success, Role has been added.');
    }

    // Display the specified resource.
    public function show(int $role_id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(int $role_id)
    {
        $this->updateControllersList();
        $role = Role::find($role_id);
        $permissions = Permission::select('permission_id', 'permission_name', 'controller', 'method')->orderBy('controller')->get();
        $role_permissions = RolePermission::select('role_permission_id', 'role_id', 'permission_id')->get();
        return view('role.edit')
            ->with(compact('role'))
            ->with(compact('permissions'))
            ->with(compact('role_permissions'));
    }

    // Update the specified resource in storage.
    public function update(RoleUpdateRequest $request, int $role_id)
    {
        $role = Role::find($role_id);
        $role->role_name = $request->role_name;
        $role->description = $request->description;
        $role->display_seq = $request->display_seq;

        if (!$role->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Role.');
        } else {
            $role_permissions = RolePermission::select('role_permission_id', 'role_id', 'permission_id')->where('role_id', $role_id)->get();
            // Delete permissions first
            foreach ($role_permissions as $rp) {
                RolePermission::destroy($rp->role_permission_id);
            }
            // Add terminals
            foreach ($request->input('permission_id') as $pid) {
                $role_permission['role_id'] = $role->role_id;
                $role_permission['permission_id'] = $pid;
                RolePermission::create($role_permission);
            }
        }

        $role_list = new Role();
        $role_list = $role_list->orderBy('role_name')->paginate(10);

        return redirect()->route('role.index')
            ->with('success', 'Success, Role has been updated.')
            ->with('role_list', $role_list);
    }

    // Remove the specified resource from storage.
    public function destroy(int $role_id)
    {
        //$role->delete();
        Role::destroy($role_id);
        return response()->json([
            'success' => true
        ]);
    }

    // Update existing controllers list
    public function updateControllersList()
    {
        // Save/update existing list of permissions first
        // Iterate through all routes
        foreach (Route::getRoutes()->getRoutes() as $key => $route) {
            // Get route action
            $action = $route->getActionName();

            // Separating controller and method
            $_action = explode('@', $action);
            $controller = $_action[0];
            $method = end($_action);

            // Check if permission already exists in database
            $permission_check = Permission::where(['controller' => $controller, 'method' => $method])->first();
            if (!$permission_check) {
                $permission = new Permission;
                // $permission->name = 'ABC';
                $permission->controller = $controller;
                $permission->method = $method;
                $permission->save();
                // add stored permission id in array
                $permission_ids[] = $permission->id;
            }
        }
    }

    // Attach all permissions to Admin role
    public function attachAdminPermissions()
    {
        // Get list of all permission IDs
        $permission_ids = Permission::select('permission_id')->orderBy('permission_id')->get();
        // Find admin role.
        $adminRole = Role::where('role_name', 'Admin')->first();
        // Atach all permissions to Admin role
        // $adminRole->permissions()->attach($permission_ids);
    }
}
