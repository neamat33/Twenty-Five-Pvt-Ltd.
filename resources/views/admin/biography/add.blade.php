@extends('admin.layouts.app')
@section('page-title', 'Biography')
@section('content')

    <style>
        .custom_panel-group .form-group {
            margin-bottom: 1rem;
        }

        .custom_panel-group .form-group label {
            margin-bottom: .5rem
        }

        .custom_panel-group .form-group .req {
            color: red;
            margin-left: .2rem;
        }

        .custom_panel-group .form-group .form-control,
        .custom_panel-group .form-group .form-select {
            font-size: 14px;
        }
    </style>
    <div class="content">
        @if (isset($response['message']))
            <div class="alert alert-success">
                {{ $response['message'] }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <form action="{{ route('biography.update', $single->id) }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validate();">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                            <div class="card panel panel-border panel-info">
                                <div class="card-header">
                                    <h3 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                            class="collapsed">
                                            Edit Biography
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name"> Title</label><small class="req">*</small>
                                                <input required name="title" value="{{ $single->title}}"
                                                    placeholder="Enter Title" type="text" class="form-control">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="title-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="proprietor">Short Description</label><small
                                                    class="req">*</small>
                                                <textarea name="short_description" id="short_description" class="form-control">{{ $single->short_description}}</textarea>
                                                @error('proprietor')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="title-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="picture">Cover Image</label>(<code>JPG,PNG MAX SIZE 1024 KB</code>)
                                                <input type="file" id="picture" data-max-file-size="1024K"
                                                    data-allowed-file-extensions="jpg png" name="picture"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="proprietor">Description</label><small
                                                    class="req">*</small>
                                                <textarea name="description" id="description" class="form-control">{{ $single->description}}</textarea>
                                                @error('proprietor')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="title-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group pull-left m-t-22">
                                                <input type="submit" class=" btn btn-primary pull-right"
                                                    value="Save & Finish" name="submit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- panel-body -->
                        </div>
                    </div> <!-- col -->
                </form>
            </div>
        </div> <!-- container -->
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            summernote();
            function summernote() {
                $('#description').summernote({
                    height: 200,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['table']],
                    ],
                    tableClassName: 'table table-bordered table-striped'
                });
            }
        });
    </script>
@endsection
