<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserloginHistory;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => ['required'],
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if(!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The provided credentials are not correct'
            ], 422);
        }

        $user = Auth::user();

        event(new UserloginHistory($user));

        return response([
            'user' => $user,
        ]);
    }
}
