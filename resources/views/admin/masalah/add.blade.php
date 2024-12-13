@extends('admin.layouts.app')
@section('page-title','Create Masalah')
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
                @if(isset($add))
                <form action="{{ route('masalahs.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create Question Answer
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input name="name" placeholder="Persion Name"
                                                type="text" class="form-control" id="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="name-error text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Phone</label>
                                            <input name="phone" placeholder="Enter Number"
                                                type="text" class="form-control" id="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="phone-error text-danger"></span>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="question">Question</label><small class="req"> *</small>
                                    <textarea name="question" id="question" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Answer</label><small class="req"> *</small>
                                    <textarea name="answer" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="checkbox" name="status" >&nbsp; Status
                                </div>
                                <div class="form-group pull-left m-t-22">
                                    
                                    <input type="submit" class=" btn btn-primary pull-right" value="Save & Finish"
                                        name="submit" />
                                </div>
                            </div>
                        </div> <!-- panel-body -->
                    </div>
                </div> <!-- col -->
                </form>
                @endif
            </div>
        </div> <!-- End row -->
        <div class="row">
            @isset($edit)
            <form action="{{ route('masalahs.update',$single->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                @method("PUT")
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Edit Question Answer
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input name="name" value="{{ $single->name}}" placeholder="Persion Name"
                                                type="text" class="form-control" id="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="name-error text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Phone</label>
                                            <input name="phone"  value="{{ $single->phone}}"  placeholder="Enter Number"
                                                type="text" class="form-control" id="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="phone-error text-danger"></span>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="question">Question</label><small class="req"> *</small>
                                    <textarea name="question" id="question" class="form-control">{{ $single->question }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Answer</label><small class="req"> *</small>
                                    <textarea name="answer" id="description" class="form-control">{{ $single->answer }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input @if($single->status == "1") @checked(true) @endif type="checkbox" name="status" >&nbsp; Status
                                </div>
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
    <!--Masalah title Validation-->
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
