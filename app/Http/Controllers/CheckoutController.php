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
        $data['city_id'] = $request->city_id;
        $data['pincode'] = $request->pincode;
        $data['road_name'] = $request->road_name;
        $data['type_address'] = $request->type_address;
        $data['alt_phone'] = $request->alt_phone;
        $data['address'] = $request->address;
        $data['house_no'] = $request->house_no;
        $data['landmark'] = $request->landmark;




        $cartTotal = Cart::total();

        // if ($request->payment_option == 'stripe') {
        //     return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        // } elseif ($request->payment_option == 'card') {
        //     return 'Card Page';
        // } else {
        //     return view('frontend.payment.cash', compact('data', 'cartTotal'));
        // }

        if ($request->payment_option == 'cod') {
            return view('user.cod', compact('data', 'cartTotal'));
        }

    }


}
