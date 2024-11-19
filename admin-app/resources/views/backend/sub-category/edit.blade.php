@extends('backend.master')

@section('main_content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category </h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Category From -->
    <div class="row">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header border-bottom">
                    <h5>Edit Sub Category Form</h5>
                </div>
                <div class="card-body">

                    <p class="text-success">{{session('message')}}</p>

                    <form action="{{route('sub-category.update', $subCategory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control form-select" name="category_id">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$subCategory->category_id == $category->id ? 'selected' : ''}}> {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="name">Sub Category Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{$subCategory->name}}" name="name" id="name" class="form-control"
                                       placeholder="Sub Category Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="description">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea id="description" name="description" value="{{old('description')}}" class="form-control"
                                          placeholder="Text Something Here...">{{$subCategory->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3" for="image">Sub Category Image</label>
                            <div class="col-md-9">
                                <input id="image" type="file" name="image" class="form-control-file">
                                <img src="{{asset('')}}assets/upload/sub-category-image/{{$subCategory->image}}" alt="img" height="50" width="50">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label> <input type="radio" name="status" {{$subCategory->status == 1 ? 'checked' : ''}} value="1"> Published</label>
                                <label> <input type="radio" name="status" {{$subCategory->status == 0 ? 'checked' : ''}} value="0"> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Create New Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection