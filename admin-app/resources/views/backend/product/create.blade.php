@extends('backend.master')

@section('main_content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Category From -->
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5>Product Form</h5>
                </div>
                <div class="card-body">

                    <p class="text-success">{{session('message')}}</p>

                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="category_id"
                                        onchange="getSubCategoryByCategory(this.value)">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="sub_category_id" id="subCategory">
                                    <option value="">-- Select Sub Category --</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}"> {{$subCategory->name}} </option>
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
                                        <option value="{{$brand->id}}"> {{$brand->name}} </option>
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
                                        <option value="{{$unit->id}}"> {{$unit->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('name')}}" name="name" class="form-control"
                                       placeholder="Product Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Code</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('code')}}" name="code" class="form-control"
                                       placeholder="Product Code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Short Description</label>
                            <div class="col-md-9">
                                <textarea name="short_description" value="{{old('short_description')}}"
                                          class="form-control"
                                          placeholder="Text Something Here..."></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Long Description</label>
                            <div class="col-md-9">
                                <textarea name="long_description" value="{{old('long_description')}}"
                                          class="form-control"
                                          id="summernote" placeholder="Text Something Here..."></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price"
                                           placeholder="Regular Price">
                                    <input type="number" class="form-control" name="selling_price"
                                           placeholder="Selling Price">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Stock Amount</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('stock_amount')}}" name="stock_amount"
                                       class="form-control"
                                       placeholder="Stock Amount">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Meta Title</label>
                            <div class="col-md-9">
                                <textarea name="meta_title" value="{{old('meta_title')}}" class="form-control"
                                          placeholder="Text Something Here..."></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Meta Description</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" value="{{old('meta_description')}}"
                                          class="form-control"
                                          placeholder="Text Something Here..."></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" value="{{old('image')}}" name="image" class="form-control-file">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Product Other Image</label>
                            <div class="col-md-9">
                                <input type="file" value="{{old('other_image')}}" multiple name="other_image[]"
                                       class="form-control-file">
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

@section('script')
    <script>
        @if(session('message'))
        toastr.success("{{session('message')}}")
        @endif

        {{--subcategoryBy Category--}}

        function getSubCategoryByCategory(categoryId) {
            $.ajax({
                type: "GET",
                url: "{{url('/get-sub-category-by-category')}}",
                data: {id: categoryId},
                DataType: "JSON",
                success: function (response) {
                    console.log(response);
                    var option = '';
                    option   += ' <option value="">-- Select Sub Category --</option>';
                    $.each(response, function (key, value) {
                        option   += ' <option value=" '+value.id+' "> '+value.name+' </option>';
                    });
                    $('#subCategory').empty();
                    $('#subCategory').append(option);
                }
            })
        }
    </script>
@endsection

