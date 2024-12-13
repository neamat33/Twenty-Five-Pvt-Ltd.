@extends('admin.layouts.app')
@section('page-title','Create Blog')
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
    .custom_panel-group .form-group .form-control, .custom_panel-group .form-group .form-select {
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
                @isset($add)
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create Blog
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Title</label><small class="req">*</small>
                                            <input required name="title" placeholder="Blog Name, UPC, ASIIN"
                                                type="text" class="form-control" id="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="title-error text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="picture">Cover Image</label><small
                                                class="req">*</small>(<code>JPG,PNG MAX SIZE 1024 KB</code>)
                                            <input type="file" required id="picture" data-max-file-size="1024K"
                                                data-allowed-file-extensions="jpg png" name="picture"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Contenct</label><small class="req"> *</small>
                                    <textarea name="content" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pull-left m-t-22">
                                    <input type="submit" class=" btn btn-primary pull-right" value="Save & Finish"
                                        name="submit" />
                                </div>
                            </div>
                        </div> <!-- panel-body -->
                    </div>
                </div> <!-- col -->
                </form>
                @endisset
            </div>
        </div> <!-- End row -->
        <div class="row">
            @isset($edit)
            <form action="{{ route('blogs.update',$single->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                @method("PUT")
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create Blog
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Title</label><small class="req">*</small>
                                            <input required name="title" placeholder="Blog Title.."
                                                type="text" class="form-control" id="title" value="{{ $single->title }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="title-error text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="picture">Cover Image</label><small
                                                class="req">*</small>(<code>JPG,PNG MAX SIZE 1024 KB</code>)
                                            <input type="file" id="picture" data-max-file-size="1024K"
                                                data-allowed-file-extensions="jpg png" name="picture"
                                                class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Content</label><small class="req"> *</small>
                                    <textarea name="content" id="description" class="form-control">{{ $single->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pull-left m-t-22">
                                    <input type="submit" class=" btn btn-primary pull-right" value="Save & Finish"
                                        name="submit" />
                                </div>
                            </div>
                        </div> <!-- panel-body -->
                    </div>
                </div> <!-- col -->
                </form>
            @endisset
        </div> <!-- End row -->
    </div> <!-- container -->
    </div>
    <!--Blog title Validation-->
    <script>
        $(function() {
            //get_view(true);
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

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endsection
