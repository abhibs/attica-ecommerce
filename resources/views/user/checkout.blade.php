@extends('user.layout.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Checkout</h3>
                {{-- <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are products in your cart</h6>
                </div> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">

                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post" action="{{ route('user-checkout-store') }}">
                        @csrf


                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="name" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>



                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="state_id" class="form-control select-active">
                                        <option value="">Select State</option>
                                        @foreach ($states as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="phone" value="{{ $user->phone }}"
                                    placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="district_id" class="form-control select-active">
                                        <option value="">Select District</option>

                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="alt_phone" placeholder="Alternative Phone Number">
                            </div>
                        </div>


                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="city_id" class="form-control select-active">
                                        <option value="">Select Area</option>
                                        @foreach ($cities as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="address" placeholder="Enter Address">
                            </div>
                        </div>


                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <input type="text" name="pincode" placeholder="Enter Pincode">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="house_no" placeholder="House Number, Builiding Name">
                            </div>
                        </div>

                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <input type="text" name="road_name" placeholder="Road Name, Area, Colony ">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="landmark" placeholder="Near Famous Shop/Mall/Landmark">
                            </div>
                        </div>


                        <h6 class="mb-3">Type of Address</h6>
                        <div class="form-group col-lg-6">
                            <label class="radio-inline">
                                <input type="radio" name="type_address" value="Home">
                                <p class="border p-3" style="border-radius: 100px;"><i class="fas fa-home mr-5"></i>Home
                                </p>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type_address" value="Office">
                                <p class="border p-3" style="border-radius: 100px;"><i
                                        class="fas fa-building mr-5"></i>Office
                                </p>

                            </label>
                        </div>












                </div>
            </div>


            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach ($carts as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset($item->options->image) }}"
                                                alt="#"></td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                                                    class="text-heading">{{ $item->name }}</a></h6></span>

                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">Rs. {{ $item->price }}</h4>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>




                        <table class="table no-border">
                            <tbody>


                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Rs. {{ $cartTotal }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>





                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">

                        <div class="custome-radio">

                            <input class="form-check-input" type="radio" name="payment_option" value="cod"
                                id="exampleRadios4" checked="">

                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                            class="fi-rs-sign-out ml-15"></i></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
