@extends('backend.master')

@section('main_content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Category From -->
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5> Edit Product Form</h5>
                </div>
                <div class="card-body">

                    <p class="text-success">{{session('message')}}</p>

                    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="category_id">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}> {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="sub_category_id">
                                    <option value="">-- Select Sub Category --</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{$product->sub_category_id == $subCategory->id ? 'selected' : ''}}> {{$subCategory->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Brand Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="brand_id">
                                    <option value="">-- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}> {{$brand->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Unit Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="unit_id">
                                    <option value="">-- Select Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$product->unit_id == $unit->id ? 'selected' : ''}}> {{$unit->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('name', $product->name)}}" name="name" class="form-control"
                                       placeholder="Product Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Code</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('code', $product->code)}}" name="code" class="form-control"
                                       placeholder="Product Code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Short Description</label>
                            <div class="col-md-9">
                                <textarea name="short_description" value="{{old('short_description')}}" class="form-control"
                                          placeholder="Text Something Here...">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Long Description</label>
                            <div class="col-md-9">
                                <textarea name="long_description" value="{{old('long_description')}}" class="form-control"
                                          id="summernote"   placeholder="Text Something Here...">{!! $product->long_description !!}}</textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" placeholder="Regular Price" >
                                    <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price" placeholder="Selling Price" >
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Stock Amount</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('stock_amount', $product->stock_amount)}}" name="stock_amount" class="form-control"
                                       placeholder="Stock Amount">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Meta Title</label>
                            <div class="col-md-9">
                                <textarea name="meta_title" value="{{old('meta_title', $product->meta_title)}}" class="form-control"
                                          placeholder="Text Something Here..."></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Meta Description</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" value="{{old('meta_description')}}" class="form-control"
                                          placeholder="Text Something Here...">{{$product->meta_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" value="{{old('image')}}" name="image" class="form-control-file">
                                <img src="{{asset('')}}assets/upload/product-image/{{$product->image}}" height="50" width="50">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Product Other Image</label>
                            <div class="col-md-9">
                                <input type="file" value="{{old('other_image')}}" multiple name="other_image[]" class="form-control-file">
                                @foreach($productOtherImage as $otherImages)
                                <img src="{{asset('')}}assets/upload/product-other-image/{{$otherImages->other_image}}" height="50" width="50">
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label> <input type="radio" name="status" value="1" checked> Published</label>
                                <label> <input type="radio" name="status" value="0"> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Create New Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@if(session('message'))
    <script>
        toastr.success("{{session('message')}}")
    </script>
@endif

