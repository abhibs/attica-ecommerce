<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Order;
use App\Models\OrderItem;

use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{

    public function codOrder(Request $request)
    {
        $total_amount = round(Cart::total());
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'house_no' => $request->house_no,
            'road_name' => $request->road_name,
            'landmark' => $request->landmark,
            'type_address' => $request->type_address,
            'payment_type' => $request->payment_option,
            'payment_method' => 'Cash On Delivery',
            'currency' => 'IND',
            'amount' => $total_amount,
            'invoice_no' => 'AGC' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'cost' => $cart->options->price,
                'gst' => $cart->options->gst,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);

        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user-dashboard')->with($notification);

    }
}
