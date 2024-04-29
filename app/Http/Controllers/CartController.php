<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

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

}
