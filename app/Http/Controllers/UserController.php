<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $user_list = new User();
        $user_list = $user_list->orderBy('first_name')->orderBy('last_name')->paginate(10);
        $branch_list = Branch::select('branch_id', 'company_id', 'branch_name', 'display_seq')->orderBy('branch_name')->get();
        $role_list = Role::select('role_id', 'role_name', 'display_seq')->orderBy('display_seq')->get();
        return view('user.index')
            ->with('login_id', Auth::user()->id)
            ->with('user_list', $user_list)
            ->with(compact('branch_list'))
            ->with(compact('role_list'));
    }

    // Search result.
    public function search(Request $request)
    {
        $user_list = new User();
        if ($request->filled('search')) {
            $user_list = $user_list->where('first_name', 'LIKE', "%{$request->search}%")->orWhere('last_name', 'LIKE', "%{$request->search}%")->orderBy('first_name')->orderBy('last_name')->paginate(10);
        }
        $branch_list = Branch::select('branch_id', 'company_id', 'branch_name', 'display_seq')->orderBy('branch_name')->get();
        $role_list = Role::select('role_id', 'role_name', 'display_seq')->orderBy('display_seq')->get();
        return view('user.index')
            ->with('login_id', Auth::user()->id)
            ->with('user_list', $user_list)
            ->with(compact('branch_list'))
            ->with(compact('role_list'))
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // return view('auth.register');
        $branch_list = Branch::select('branch_id', 'company_id', 'branch_name', 'display_seq')->orderBy('branch_name')->get();
        $role_list = Role::select('role_id', 'role_name', 'display_seq')->orderBy('role_name')->get();
        return view('user.create')
            ->with(compact('branch_list'))
            ->with(compact('role_list'));
    }

    // Store a newly created resource in storage.
    public function store(UserStoreRequest $request)
    {

        $user = User::create([
            'employee_number' => $request->employee_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'branch_id' => $request->branch_id,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'card_password' => $request->card_password,
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding User.');
        }

        return redirect()->route('user.index')->with('success', 'Success, User has been added.');
    }

    // Display the specified resource.
    public function show(int $id)
    {
        //
    }


    // Show the form for editing the specified resource.
    public function edit(int $id)
    {
        $branch_list = Branch::select('branch_id', 'company_id', 'branch_name',  'display_seq')->orderBy('branch_name')->get();
        $role_list = Role::select('role_id', 'role_name', 'display_seq')->orderBy('role_name')->get();
        $user = User::find($id);

        return view('user.edit')
            ->with('branch_id', $user->branch_id)
            ->with('role_id', $user->role_id)
            ->with(compact('branch_list'))
            ->with(compact('role_list'))
            ->with(compact('user'));
    }

    // Update the specified resource in storage.
    public function update(UserUpdateRequest $request, int $id)
    {
        $user = User::find($id);
        $user->employee_number = $request->employee_number;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->branch_id = $request->branch_id;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->card_password = $request->card_password;

        if (!$user->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the User.');
        }
        $user_list = new User();
        $user_list = $user_list->orderBy('first_name')->orderBy('last_name')->paginate(10);
        $branch_list = Branch::select('branch_id', 'company_id', 'branch_name', 'display_seq')->orderBy('branch_name')->get();
        $role_list = Role::select('role_id', 'role_name', 'display_seq')->orderBy('display_seq')->get();
        if ($id == Auth::user()->id) {
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('user.index')
                ->with('success', 'Success, User has been updated.')
                ->with('login_id', Auth::user()->id)
                ->with('user_list', $user_list)
                ->with(compact('branch_list'))
                ->with(compact('role_list'));
        }
    }

    // Remove the specified resource from storage.
    public function destroy(int $id)
    {
        User::destroy($id);

        return response()->json([
            'deleted_id' => $id
        ]);
    }
}
