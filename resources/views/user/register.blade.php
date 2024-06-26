@extends('user.layout.app')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Create an Account</h1>
                                        <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>
                                    <form method="post" action="{{ route('user-register-post') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Email" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm password" />
                                        </div>



                                        <div class="form-group mb-30">
                                            <button type="submit"
                                                class="btn btn-fill-out btn-block hover-up font-weight-bold">
                                                Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="#" class="social-login apple-login">
                                    <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                    <span>Continue with Apple</span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
