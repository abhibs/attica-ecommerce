@extends('user.layout.app')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Track Your Order
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">

                                @include('user.layout.sidebar')
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Track Your Order</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('order-track-post') }}">
                                                @csrf



                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <label>Invoice Code <span class="required">*</span></label>
                                                        <input class="form-control" name="code" type="text"
                                                            placeholder="Your Order Invoice Number" />
                                                        @error('code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>





                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                            class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                            value="Submit">Tract Order</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
