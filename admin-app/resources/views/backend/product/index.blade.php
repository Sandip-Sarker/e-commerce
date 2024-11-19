@extends('backend.master')

@section('main_content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product List</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Category Table -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product</h3>
                </div>
                <div class="card-body">

                    <p class="text-danger">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL</th>
                                <th class="wd-15p border-bottom-0">Category</th>
                                <th class="wd-15p border-bottom-0">Sub Category</th>
                                <th class="wd-15p border-bottom-0">Brand</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Price</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name ?? ''}}</td>
                                <td>{{$product->subCategory->name ?? ''}}</td>
                                <td>{{$product->brand->name ?? ''}}</td>
                                <td>{{$product->name ?? ''}}</td>
                                <td>
                                    <ul>
                                        <li>Regular Price: {{$product->regular_price ?? ''}}</li>
                                        <li>Selling Price: {{$product->selling_price ?? ''}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="{{asset('')}}assets/upload/product-image/{{$product->image ?? ''}}" height="50" width="50">
                                </td>
                                <td>{{$product->status ?? ''}}</td>
                                <td>
                                    <a href="{{route('product.show', $product->id ?? '')}}" title="Show"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('product.edit', $product->id ?? '')}}" title="Edit"> <i class="fa fa-edit"></i></a>
                                    <a href="{{route('product.delete', $product->id ?? '')}}" title="Delete"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
