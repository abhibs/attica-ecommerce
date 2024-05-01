<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_hint = $request->password;

        $user->save();

        $notification = array(
            'message' => 'User Registered Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('login')->with($notification);

    }

    public function login()
    {
        return view('user.login');
    }


    public function loginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        $credentials['password'] = $request->password;
        // dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
            // dd('hi');
            $notification1 = array(
                'message' => 'User Login Successful',
                'alert-type' => 'success'
            );
            return redirect()->route('user-index')->with($notification1);
        } else {
            $notification2 = array(
                'message' => 'Invalid Credentials',
                'alert-type' => 'error'
            );
            return back()->with($notification2);
        }
    }

    public function userDashboard()
    {
        return view('user.userdashboard');
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }


}
