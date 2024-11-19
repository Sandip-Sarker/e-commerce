@extends('backend.master')

@section('main_content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Detail Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
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
                    <h3 class="card-title">Detail Product</h3>
                </div>
                <div class="card-body">
                    <p class="text-danger">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <tr>
                                <th>Category Name</th>
                                <td>{{$product->category->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Sub Category Name</th>
                                <td>{{$product->subCategory->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Brand Name</th>
                                <td>{{$product->brand->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Unit Name</th>
                                <td>{{$product->unit->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>{{$product->code ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{$product->short_description ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                <td>{!! $product->long_description ?? '' !!}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>{{$product->regular_price?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Selling Price</th>
                                <td>{{$product->selling_price?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{$product->stock_amount?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Meta Title</th>
                                <td>{{$product->meta_title?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Meta Description</th>
                                <td>{{$product->meta_description?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td>
                                    <img src="{{asset('')}}assets/upload/product-image/{{$product->image?? ''}}" height="50" width="50">
                                </td>
                            </tr>

                            <tr>
                                <th>Product Other Image</th>
                                <td>
                                    @foreach($product->productImages as $productImage)
                                        <img src="{{asset('')}}assets/upload/product-other-image/{{$productImage->other_image?? ''}}" height="50" width="50">
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Hit Count</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>

                            <tr>
                                <th>Sales Count</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{$product->status}}</td>
                            </tr>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
