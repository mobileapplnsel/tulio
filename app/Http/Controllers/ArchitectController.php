<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchitectController extends Controller
{
    public function login()
    {
        return view('architect.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $credentials['user_type'] = 3;
        if (auth()->guard('architect')->attempt($credentials)) {        
            return response()->json(['redirect'=>route('architect.dashboard')], 401);
        }
        
        return response()->json(['message'=>'Invalid email or password'], 401);
    }
}
