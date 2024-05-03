<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pincode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\State;
use App\Models\District;
use App\Models\City;



class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        Cart::add([

            'id' => $id,
            'name' => $request->name,
            'qty' => $request->quantity,
            'price' => $product->total,
            'weight' => 1,
            'options' => [
                'image' => $product->image,
                'price' => $product->price,
                'gst' => $product->gst,
            ],
        ]);

        return response()->json(['success' => 'Successfully Added on Your Cart']);


    }// End Method


    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(
            array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal

            )
        );
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }

    public function AddToCartDetails(Request $request, $id)
    {



        $product = Product::findOrFail($id);
        Cart::add([

            'id' => $id,
            'name' => $request->name,
            'qty' => $request->quantity,
            'price' => $product->total,
            'weight' => 1,
            'options' => [
                'image' => $product->image,
                'price' => $product->price,
                'gst' => $product->gst,
            ],
        ]);

        return response()->json(['success' => 'Successfully Added on Your Cart']);


    }

    public function userCart()
    {

        return view('user.cart');

    }


    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(
            array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal

            )
        );

    }


    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }

    public function CartDecrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);




        return response()->json('Decrement');

    }// End Method


    public function CartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);



        return response()->json('Increment');

    }


    public function getCartDetails()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();




        return response()->json(
            array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal

            )
        );
    }


    public function checkPincode(Request $request)
    {

        $pincode = Pincode::where('pincode', $request->pincode)->first();

        if ($pincode) {
            return response()->json(
                array(
                    'validity' => true,
                    'success' => 'Delivery available'

                )
            );


        } else {
            return response()->json(['error' => 'Sorry, We are coming soon in this area']);
        }

    }


    public function checkout()
    {


        if (Auth::check()) {

            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $user = Auth::user();

                $states = State::latest()->get();
                $districts = District::latest()->get();
                $cities = City::latest()->get();





                // dd($carts);

                return view('user.checkout', compact('carts', 'cartQty', 'cartTotal', 'user', 'states', 'districts', 'cities'));


            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }



        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }




    }





}
