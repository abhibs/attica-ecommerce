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
                                            <h3 class="mb-0">Account Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('user-profile-update') }}"
                                                enctype="multipart/form-data">
                                                @csrf


                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label> Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="name"
                                                            type="text" value="{{ $userData->name }}" />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email"
                                                            type="text" value="{{ $userData->email }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="phone"
                                                            type="text" value="{{ $userData->phone }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="address"
                                                            type="text" value="{{ $userData->address }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>User Photo <span class="required">*</span></label>
                                                        <input class="form-control" name="image" type="file"
                                                            id="image" />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label> <span class="required">*</span></label>
                                                        <img id="showImage"
                                                            src="{{ !empty($userData->image) ? url('storage/user/' . $userData->image) : url('no_image.jpg') }}"
                                                            alt="User" class="rounded-circle p-1 bg-primary"
                                                            width="110">
                                                    </div>



                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                            class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                            value="Submit">Update Profile</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
