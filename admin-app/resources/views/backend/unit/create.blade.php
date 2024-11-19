@extends('backend.master')

@section('main_content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Category From -->
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5>Create Unit Form</h5>
                </div>
                <div class="card-body">

                    <p class="text-success">{{session('message')}}</p>

                    <form action="{{route('unit.store')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3">Unit Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('name')}}" name="name" class="form-control"
                                       placeholder="Unit Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Unit Code</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('code')}}" name="code" class="form-control"
                                       placeholder="Unit Code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Unit Description</label>
                            <div class="col-md-9">
                                <textarea name="description" value="{{old('description')}}" class="form-control"
                                          placeholder="Text Something Here..."></textarea>
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
                                <button type="submit" class="btn btn-success">Create New Unit</button>
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

