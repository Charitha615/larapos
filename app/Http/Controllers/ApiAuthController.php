<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function loginCashier(Request $request) {
        $user = User::where([
            'employee_number' => $request->employee_number,
            'card_password' => $request->card_password
        ])->first();

        if ($user) {
            return response()->json([
                'error' => false,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'User not found'
            ]);
        }
    }
}
