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
        $data['branch_id'] = $request->branch_id;
        $data['address'] = $request->address;
        $data['pincode'] = $request->pincode;
        $data['house_no'] = $request->house_no;
        $data['road_name'] = $request->road_name;
        $data['landmark'] = $request->landmark;
        $data['type_address'] = $request->type_address;
        $data['type_delivery'] = $request->type_delivery;
        $data['payment_option'] = $request->payment_option;


        $cartTotal = Cart::total();

        // Define delivery charge based on the selected delivery option
        $deliveryCharge = 0;
        if ($request->type_delivery == 'Delivery_Boy') {
            $deliveryCharge = 200;
        } else {
            $deliveryCharge = 0;
        }

        $totalAmount = $cartTotal + $deliveryCharge;




        if ($request->payment_option == 'cod') {
            return view('user.cod', compact('data', 'cartTotal', 'totalAmount', 'deliveryCharge'));
        }

    }
}
