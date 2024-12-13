@extends('admin.layouts.app')

@section('page-title','Create Category')

@section('content')
    <style>
        .imgPreview img {
            height: 73px;
            width: 100px;
            float: left;
            padding: 3px;
            margin-top: 2px;
            border: 1px solid #ccc;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3>Add / Edit Category</h3>
        </div>
        <div class="card-body">
            @isset($add)
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data"
                            data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="first-name">Name <span class="required">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name') }}">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group pt-2 pb-2">
                                 <input type="checkbox" id="status" name="status" checked> &nbsp; Status
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="item form-group">
                                    <div style="float: right">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endisset
            @isset($edit)
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">

                        <form action="{{ route('categories.update', $single->id) }}" method="post" enctype="multipart/form-data"
                            data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            @method('Put')

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="first-name">Name <span class="required">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name',$single->name) }}">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group pt-2 pb-2">
                                 <input type="checkbox" @if($single->status=="1") @checked(true) @endif id="status" name="status"> &nbsp; Status
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="item form-group">
                                    <div style="float: right">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            @endisset
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
