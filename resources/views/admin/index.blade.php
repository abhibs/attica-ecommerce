@extends('admin.layout.app')
@section('content')
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body" style="background-color: #816436;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $productCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Product</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body" style="background-color: #636481;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $userCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total User</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body" style="background-color: #990147;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $categoryCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Category</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body" style="background-color: #222444;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $branchCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Branch</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body" style="background-color: #005965;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $pendingOrderCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pending Order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body" style="background-color: #995965;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $confirmOrderCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Confirm Order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body" style="background-color: #983896;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $processingOrderCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Processing Order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body" style="background-color: #368778;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $deliveredOrderCount }}</h5>

                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Delivered Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
@endsection
