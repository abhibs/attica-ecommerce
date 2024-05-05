<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function checkoutStore(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['state_id'] = $request->state_id;
        $data['district_id'] = $request->district_id;
        $data['alt_phone'] = $request->alt_phone;
        $data['city_id'] = $request->city_id;
        $data['address'] = $request->address;
        $data['pincode'] = $request->pincode;
        $data['house_no'] = $request->house_no;
        $data['road_name'] = $request->road_name;
        $data['landmark'] = $request->landmark;
        $data['type_address'] = $request->type_address;
        $data['payment_option'] = $request->payment_option;

        $cartTotal = Cart::total();
        if ($request->payment_option == 'cod') {
            return view('user.cod', compact('data', 'cartTotal'));
        }

    }
}
