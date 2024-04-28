@extends('user.layout.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="row d-flex justify-content-center">
        @include('user.layout.sidebar')
        <div class="col-8">
            <form action="{{route('user-profile-update-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group mb-3">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="username" name="name" placeholder="Enter User Name" value="{{$user->name}}">
                </div>
                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
                </div>
                <div class="form-group mb-3">
                  <label for="Phone">Phone</label>
                  <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{$user->phone}}">
                </div>

                <div class="form-group mb-3">
                  <label for="Address">Address</label>
                  <textarea class="form-control" cols="30" rows="5" name="address">{{$user->address}}</textarea>    
                </div>
                <div class="form-group mb-3">
                  <label for="Phone">Profile Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                  <img id="showImage" src="{{ !empty($user->image) ? url('storage/user/' . $user->image) : url('no_image.jpg') }}" alt="" width="100px" height="100px">
                </div>
                <div class="text-center mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                </div>
              </form>
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