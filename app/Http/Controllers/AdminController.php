<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $credentials['user_type'] = 4;
        if (auth()->guard('admin')->attempt($credentials)) {        
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid email or password']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    

    public function showForgetPasswordForm()
      {
         return view('admin.forgot_password');
      }

      public function adminProfile()
      {
        $user_detail= auth()->user();
        /*$user_detail = User::get();
        dd($u_name);*/
        return view('admin.user_profile',compact('user_detail'));
      }

      public function updateProfile(Request $request)
      {
         $request->validate([
            'u_name' => 'required|string',
            'u_email' => 'required|email',
            'password' => 'required',
        
        ]);

        $user = auth()->guard('admin')->user();
        $user->name = $request->u_name;
        $user->email = $request->u_email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.profile')->with('success','profile updated successfully.');
      }
}
