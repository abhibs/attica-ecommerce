@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add New Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('product-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">


                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle"
                                            placeholder="Enter Product Name">
                                    </div>





                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Description</label>
                                        <textarea name="content" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Long Description</label>
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                    </div>



                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Image</label>
                                        <input name="image" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">

                                        <img src="" id="mainThmb" class="mt-3" />
                                    </div>



                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Multiple Image</label>
                                        <input class="form-control" name="multi_img[]" type="file" id="multiImg"
                                            multiple="">

                                        <div class="row mt-3" id="preview_img"></div>

                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Gold Rate</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="gold_id">
                                                <option selected="">Choose the Gold Rate</option>
                                                @foreach ($golds as $item)
                                                    <option value="{{ $item->id }}">{{$item->name}} = {{ $item->rate }} Rs.</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Gold Gram</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="weight_id">
                                                <option selected="">Choose the Gold Gram</option>
                                                @foreach ($weights as $item)
                                                    <option value="{{ $item->id }}">{{ $item->gram }} grams</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        
                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label">Gold Category</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="category_id">
                                                <option selected="">Choose the Gold Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label">Gold Quality</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="quality_id">
                                                <option selected="">Choose the Gold Quality</option>
                                                @foreach ($qualities as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputProductTags" class="form-label">Rating From 1 to 5</label>
                                            <input type="number" class="form-control" name="rating" id="inputProductTags"
                                                placeholder="Enter Rating">
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" name="featured_product" type="checkbox"
                                                    value="1" id="customckeck3">
                                                <label class="form-check-label" for="customckeck3">Featured
                                                    Product</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" name="new_arrivals" type="checkbox"
                                                    value="1" id="customckeck4">
                                                <label class="form-check-label" for="customckeck4">New Arrivals</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
