@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Area</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Area</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="{{ route('city-update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">



                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Select State</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="state_id">
                                                <option selected="">Choose State</option>
                                                @foreach ($states as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }} </option>
                                                @endforeach

                                            </select>

                                            @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Select District</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="district_id">
                                                <option selected="">Choose District</option>
                                                @foreach ($districts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }} </option>
                                                @endforeach

                                            </select>

                                            @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id=""
                                                placeholder="Enter City Name" value="{{ $data->name }}" />

                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>










                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update Area" />
                                        </div>
                                    </div>
                            </div>

                            </form>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
