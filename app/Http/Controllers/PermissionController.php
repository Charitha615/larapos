<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $this->updateControllersList();
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
}
