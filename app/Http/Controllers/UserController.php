<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Intervention\Image\Facades\Image;
use App\Models\Order;


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
            return redirect()->route('user-dashboard')->with($notification1);
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
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('user.userdashboard', compact('userData'));
    }

    public function profileUpdate(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;


        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     // @unlink(public_path('storage/user/' . $data->image));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/user_images'), $filename);
        //     $data['photo'] = $filename;
        // }

        if ($request->file('image')) {
            $image = $request->file('image');
            // @unlink(public_path('storage/user/' . $data->image));
            $filename = 'user' . time() . '.' . $image->getClientOriginalExtension();

            // installing image intervention
            // composer require intervention/image

            // config/app.php
            // Intervention\Image\ImageServiceProvider::class,
            // 'Image' => Intervention\Image\Facades\Image::class,

            // php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"


            Image::make($image)->resize(256, 256)->save('storage/user/' . $filename);
            $filePath = 'storage/user/' . $filename;
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function userChangePassword()
    {
        return view('user.change_password');

    }

    public function userUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
            'password_hint' => $request->new_password
        ]);
        return back()->with("status", " Password Changed Successfully");


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


    public function userOrder()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('user.orders', compact('orders'));
    }

    public function trackOrder()
    {
        return view('user.track_order');
    }

    public function orderTrackPost(Request $request)
    {
        $request->validate([
            'code' => 'required',

        ], [
            'code.required' => 'Order Invoice Number Required',
        ]);

        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {
            return view('user.track_detail', compact('track'));

        } else {

            $notification = array(
                'message' => 'Invoice Code Is Invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }

    }


}
