<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrder()
    {
        $datas = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending_orders', compact('datas'));
    }

    public function confirmedOrder()
    {
        $datas = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('admin.orders.confirmed_orders', compact('datas'));
    }

    public function processingOrder()
    {
        $datas = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('admin.orders.processing_orders', compact('datas'));
    }


    public function deliveredOrder()
    {
        $datas = Order::where('status', 'deliverd')->orderBy('id', 'DESC')->get();
        return view('admin.orders.deliverd_orders', compact('datas'));
    }


    public function orderDetail($id)
    {
        $order = Order::with('state', 'district', 'city', 'user')->where('id', $id)->first();
        // dd($order);
        $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        // dd($orderItem);


        return view('admin.orders.order_details', compact('order', 'orderItem'));
    }


    public function pendingToConfirm($id)
    {
        Order::findOrFail($id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-order')->with($notification);
    }


    public function confirmToProcess($id)
    {
        Order::findOrFail($id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-order')->with($notification);
    }

    public function processToDelivered($id)
    {

        $product = OrderItem::where('order_id', $id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['stock' => DB::raw('stock-' . $item->qty)]);
        }

        Order::findOrFail($id)->update(['status' => 'deliverd']);

        $notification = array(
            'message' => 'Order Deliverd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('deliverd-order')->with($notification);


    }


}
