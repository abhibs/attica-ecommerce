@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Order Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Order Details</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <hr />


        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                            <tr>
                                <th>Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>

                            <tr>
                                <th>Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>

                            <tr>
                                <th>Email:</th>
                                <th>{{ $order->email }}</th>
                            </tr>

                            <tr>
                                <th>Address:</th>
                                <th>{{ $order->address }}</th>
                            </tr>
                            <tr>
                                <th>State :</th>
                                <th>{{ $order->state->name }}</th>
                            </tr>

                            <tr>
                                <th>District:</th>
                                <th>{{ $order->district->name }}</th>
                            </tr>

                            <tr>
                                <th>City:</th>
                                <th>{{ $order->city->name }}</th>
                            </tr>



                            <tr>
                                <th>Pincode:</th>
                                <th>{{ $order->pincode }}</th>
                            </tr>

                            <tr>
                                <th>Order Date :</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details
                            <span class="text-danger">Invoice : {{ $order->invoice_no }} </span>
                        </h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                            <tr>
                                <th> Name :</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>

                            <tr>
                                <th>Payment Type:</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>




                            <tr>
                                <th>Invoice:</th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>

                            <tr>
                                <th>Order Amonut:</th>
                                <th>Rs. {{ $order->amount }}</th>
                            </tr>

                            <tr>
                                <th>Order Status:</th>
                                <th><span class="badge bg-danger" style="font-size: 15px;">{{ $order->status }}</span></th>
                            </tr>


                            <tr>
                                <th> </th>
                                <th>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('pending-confirm', $order->id) }}"
                                            class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                    @elseif($order->status == 'confirm')
                                        <a href="{{ route('confirm-process', $order->id) }}"
                                            class="btn btn-block btn-success" id="processing">Processing
                                            Order</a>
                                    @elseif($order->status == 'processing')
                                        <a href="{{ route('process-deliver', $order->id) }}"
                                            class="btn btn-block btn-success" id="delivered">Delivered
                                            Order</a>
                                    @endif



                                </th>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>
        </div>






        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
            <div class="col">
                <div class="card">


                    <div class="table-responsive">
                        <table class="table" style="font-weight: 600;">
                            <tbody>
                                <tr>
                                    <td class="col-md-1">
                                        <label>Image </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Product Name </label>
                                    </td>




                                    <td class="col-md-3">
                                        <label>Price </label>
                                    </td>

                                </tr>


                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label><img src="{{ asset($item->product->image) }}"
                                                    style="width:50px; height:50px;"> </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $item->product->name }}</label>
                                        </td>




                                        <td class="col-md-3">
                                            <label>Price = Rs. {{ $item->price }} <br> Total = Rs.
                                                {{ $item->price * $item->qty }}
                                            </label>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>



                </div>
            </div>

        </div>






    </div>
@endsection
