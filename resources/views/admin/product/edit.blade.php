@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('product-update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">


                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle"
                                            placeholder="Enter Product Name" value="{{ $data->name }}">
                                    </div>





                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Description</label>
                                        <textarea name="content" class="form-control" id="inputProductDescription" rows="3">{{ $data->content }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Long Description</label>
                                        <textarea class="ckeditor form-control" name="description">{!! $data->description !!}</textarea>
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
                                                @foreach ($golds as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $data->gold_id ? 'selected' : '' }}>
                                                        {{ $item->name }} = Rs.
                                                        {{ $item->rate }} </option>
                                                @endforeach

                                                {{-- <div class="form-group mb-3">
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

                                    </div> --}}
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Gold Gram</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="weight_id">
                                                {{-- <option selected="">Choose the Gold Gram</option> --}}
                                                @foreach ($weights as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $data->weight_id ? 'selected' : '' }}>
                                                        {{ $item->gram }} grams</option>
                                                @endforeach

                                            </select>
                                        </div>



                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label">Gold Category</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="category_id">
                                                {{-- <option selected="">Choose the Gold Category</option> --}}
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $data->category_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label">Gold Quality</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="quality_id">
                                                {{-- <option selected="">Choose the Gold Quality</option> --}}
                                                @foreach ($qualities as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $data->quality_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductTags" class="form-label">Stock / Inventory</label>
                                            <input type="number" class="form-control" name="stock" id="inputProductTags"
                                                placeholder="Enter Stock / Inventory" value="{{ $data->stock }}">
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductTags" class="form-label">Rating From 1 to 5</label>
                                            <input type="number" class="form-control" name="rating" id="inputProductTags"
                                                placeholder="Enter Rating" value="{{ $data->rating }}">
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" name="featured_product" type="checkbox"
                                                    value="1" id="customckeck3"
                                                    {{ $data->featured_product == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="customckeck3">Featured
                                                    Product</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" name="new_arrivals" type="checkbox"
                                                    value="1" id="customckeck4"
                                                    {{ $data->new_arrivals == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="customckeck4">New Arrivals</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>


        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Update Product Image </h6>
            <hr>
            <div class="card">
                <form method="post" action="{{ route('product-image-update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="old_img" value="{{ $data->image }}">

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Choose Image </label>
                            <input name="image" class="form-control" type="file" id="formFile"
                                onChange="mainThamUrl(this)">

                            <img src="{{ asset($data->image) }}" id="mainThmb" class="mt-3"
                                style="width:100px; height:100px" />

                        </div>




                        <input type="submit" class="btn btn-primary px-4" value="Update Image" />

                    </div>

                </form>

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
@endsection
