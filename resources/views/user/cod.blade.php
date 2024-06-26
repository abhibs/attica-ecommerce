@extends('user.layout.app')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Cash On Delivery
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Cash On Delivery Payment</h3>
                <div class="d-flex justify-content-between">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">


                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order Details</h4>

                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">

                        <table class="table no-border">
                            <tbody>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Rs.{{ $cartTotal }}</h4>
                                    </td>
                                </tr>



                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Delivery Charges</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">
                                            Rs. {{ $deliveryCharge }}</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Rs. {{ $totalAmount }}</h4>
                                    </td>
                                </tr>


                            </tbody>
                        </table>





                    </div>
                </div>


            </div> <!-- // end lg md 6 -->


            <div class="col-lg-6">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Make Cash Payment </h4>

                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">


                        <form action="{{ route('cod-order-store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">


                                    <input type="hidden" name="name" value="{{ $data['name'] }}">
                                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                                    <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                    <input type="hidden" name="alt_phone" value="{{ $data['alt_phone'] }}">
                                    <input type="hidden" name="city_id" value="{{ $data['city_id'] }}">
                                    <input type="hidden" name="branch_id" value="{{ $data['branch_id'] }}">
                                    <input type="hidden" name="address" value="{{ $data['address'] }}">
                                    <input type="hidden" name="pincode" value="{{ $data['pincode'] }}">
                                    <input type="hidden" name="house_no" value="{{ $data['house_no'] }}">
                                    <input type="hidden" name="road_name" value="{{ $data['road_name'] }}">
                                    <input type="hidden" name="landmark" value="{{ $data['landmark'] }}">
                                    <input type="hidden" name="type_address" value="{{ $data['type_address'] }}">
                                    <input type="hidden" name="type_delivery" value="{{ $data['type_delivery'] }}">
                                    <input type="hidden" name="payment_option" value="{{ $data['payment_option'] }}">

                                </label>

                                <!-- Used to display form errors. -->

                            </div>
                            <br>
                            <button class="btn btn-primary">Submit Payment</button>
                        </form>


                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
