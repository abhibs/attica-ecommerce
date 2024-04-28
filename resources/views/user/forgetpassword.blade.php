@extends('user.layout.app')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Forget Password</h3>
        <form action="" method="POST"></form>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
          </div>
        </form>
    </div>
</div>

@endsection