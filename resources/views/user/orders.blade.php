@extends('user.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
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
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" style="background:#ddd;font-weight: 600;">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl</th>
                                                            <th>Date</th>
                                                            <th>Totaly</th>
                                                            <th>Payment</th>
                                                            <th>Invoice</th>
                                                            <th>Status</th>
                                                            {{-- <th>Actions</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $key => $order)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td> {{ $order->order_date }}</td>
                                                                <td> Rs.{{ $order->amount }}</td>
                                                                <td> {{ $order->payment_method }}</td>
                                                                <td> {{ $order->invoice_no }}</td>
                                                                <td>
                                                                    @if ($order->status == 'pending')
                                                                        <span
                                                                            class="badge rounded-pill bg-warning">Pending</span>
                                                                    @elseif($order->status == 'confirm')
                                                                        <span
                                                                            class="badge rounded-pill bg-info">Confirm</span>
                                                                    @elseif($order->status == 'processing')
                                                                        <span
                                                                            class="badge rounded-pill bg-dark">Processing</span>
                                                                    @elseif($order->status == 'deliverd')
                                                                        <span
                                                                            class="badge rounded-pill bg-success">Deliverd</span>
                                                                    @endif


                                                                </td>


                                                                {{-- <td><a href="" class="btn-sm btn-success"><i
                                                                            class="fa fa-eye"></i>
                                                                        View</a>
                                                                    <a href="" class="btn-sm btn-danger"><i
                                                                            class="fa fa-download"></i> Invoice</a>
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
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
    </div>
@endsection
