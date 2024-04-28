@extends('user.layout.app')
@section('content')
    <div class="row d-flex justify-content-center">
        @include('user.layout.sidebar')
        <div class="col-8">
            <form action="{{route('user-change-password-post')}}" method="POST">
                @csrf
                <div style="display: none;">

                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="form-group mb-3">
                    <label for="currentPassword">Old Password</label>
                    <input type="password" class="form-control" id="currentPassword" placeholder="Enter Old password"
                        name="old_password">
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" name="new_password">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="confirmPassword">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password"
                        name="new_password_confirmation">
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                </div>


            </form>
        </div>
    </div>
@endsection
