@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('product-create') }}" class="btn btn-primary">Add Products</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th> Product Name </th>
                                <th> Product Image </th>
                                <th> Category </th>
                                <th> Quality </th>
                                <th> Gold Rate </th>
                                <th> Weight </th>
                                <th> Price </th>
                                <th> GST </th>
                                <th> Total </th>
                                <th> Rating </th>
                                <th> Stock </th>
                                <th> Status </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->name }}</td>
                                    <td> <img src="{{ asset($item->image) }}" style="width: 70px; height:40px;">
                                    </td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->quality->name }}</td>
                                    <td>{{ $item->gold->name }} = {{ $item->gold->rate }}</td>
                                    <td>{{ $item->weight->gram }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->gst }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-pill bg-success">Active</span>
                                        @else
                                            <span class="badge badge-pill bg-danger">InActive</span>
                                        @endif


                                    </td>

                                    <td>
                                        <a href="{{ route('product-edit', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('product-delete', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                        @if ($item->status == 1)
                                            <a href="{{ route('product-inactive', $item->id) }}"
                                                class="btn btn-primary rounded-pill waves-effect waves-light"
                                                title="Inactive"><i class="fa-solid fa-thumbs-down"></i> </a>
                                        @else
                                            <a href="{{ route('product-active', $item->id) }}"
                                                class="btn btn-primary rounded-pill waves-effect waves-light"
                                                title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th> Product Name </th>
                                <th> Product Image </th>
                                <th> Category </th>
                                <th> Quality </th>
                                <th> Gold Rate </th>
                                <th> Weight </th>
                                <th> Price </th>
                                <th> GST </th>
                                <th> Total </th>
                                <th> Rating </th>
                                <th> Stock </th>
                                <th> Status </th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
