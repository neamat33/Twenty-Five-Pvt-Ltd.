@extends('admin.layouts.app')
@section('page-title','Create Book')
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
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create Book
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Book Name</label><small class="req">*</small>
                                            <input required name="title" placeholder="Book Name, UPC, ASIIN"
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
                                            <label for="category_id">Category Name</label><small class="req">*</small>
                                            <select name="category_id" id="category_id" required id="category_id"
                                                class="form-control selectpicker">
                                                @isset($category)
                                                    <option value="">--Select--</option>
                                                    @foreach ($category as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Opening Quantity</label>
                                            <input type="text" name="opening_quantity" placeholder="Open Quantity"
                                                class="form-control" onKeyPress="return isNumber(event)" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Standard Price</label><small class="req">*</small>
                                            <input required name="price" placeholder="Regular Price" type="text"
                                                class="form-control" id="price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount">Discount </label>
                                            <input name="discount" placeholder="Discount" type="text"
                                                class="form-control" id="discount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount_type">Discount Type</label>
                                            <select name="discount_type" id="discount_type"
                                                class="form-control form-select">
                                                <option value="">--Select--</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="Per%">Per %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount_price">Discount Price </label>
                                            <input readonly name="discount_price" placeholder="0.00" type="text"
                                                class="form-control" id="discount_price">
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
                                    <div class="col-sm-8">
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label for="picture">Mutiple Image</label><small
                                                    class="req">*</small>(<code>Select Multiple Image(Press Ctrl + Mouse
                                                    click))</code>
                                                <input type="file" id="multiple_img" name="multiple_img[]"
                                                    multiple="" data-max_length="5" class="upload__inputfile">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="color">Delivery Day's</label>
                                            <select class='form-control' name='delivery_days'>
                                                <option value="Hours">Hours</option>
                                                <option value="Days">Days</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="color">Days Or Hours</label>
                                            <input type="text" name="num_day" placeholder="Days / Hours"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="color">Video</label>
                                            <input type="text" name="video" placeholder="Enter iframe"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Short Description</label><small class="req">
                                        *</small>
                                    <textarea name="short_description" required id="short_description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Description</label><small class="req"> *</small>
                                    <textarea name="description" id="description1" class="form-control"></textarea>
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
            <form action="{{ route('books.update',$single->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                @method("PUT")
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create Book
                                    </a>
                                </h3>
                            </div>

                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Book Name</label><small class="req">*</small>
                                            <input required name="title" placeholder="Book Name, UPC, ASIIN"
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
                                            <label for="category_id">Category Name</label><small class="req">*</small>
                                            <select name="category_id" id="category_id" required id="category_id"
                                                class="form-control selectpicker">
                                                @isset($category)
                                                    <option value="">--Select--</option>
                                                    @foreach ($category as $value)
                                                        <option @if($single->category_id==$value->id)
                                                            selected
                                                        @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price">Standard Price</label><small class="req">*</small>
                                            <input required name="price" value="{{ $single->price }}" placeholder="Regular Price" type="text"
                                                class="form-control" id="price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount">Discount </label>
                                            <input name="discount" placeholder="Discount" type="text"
                                                class="form-control" id="discount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount_type">Discount Type</label>
                                            <select name="discount_type" id="discount_type"
                                                class="form-control form-select">
                                                <option value="">--Select--</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="Per%">Per %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount_price">Discount Price </label>
                                            <input readonly name="discount_price" value="{{ $single->discount_price }}" placeholder="0.00" type="text"
                                                class="form-control" id="discount_price">
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
                                    <div class="col-sm-8">
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label for="picture">Mutiple Image</label>(<code>Select Multiple Image(Press Ctrl + Mouse
                                                    click))</code>
                                                <input type="file" id="multiple_img" name="multiple_img[]"
                                                    multiple="" data-max_length="5" class="upload__inputfile">
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $value = explode(' ', $single->delivery_days);
                                    @endphp
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="color">Delivery Day's</label>
                                            <select class='form-control' name='delivery_days'>
                                                @if (isset($value[1]))
                                                <option {{ $value[1] == 'Hours' ? 'selected' : '' }} value="Hours">
                                                    Hours</option>
                                                <option {{ $value[1] == 'Days' ? 'selected' : '' }} value="Days">Days
                                                </option>
                                                @else
                                                    <option value="Hours">Hours</option>
                                                    <option value="Days">Days</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="color">Days Or Hours</label>
                                            <input type="text" name="num_day" value="{{ $value[0] }}" placeholder="Days / Hours"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="color">Video</label>
                                            <input type="text" value="{{ $single->video }}" name="video" placeholder="Enter iframe"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Short Description</label><small class="req">
                                        *</small>
                                    <textarea name="short_description" required id="short_description" class="form-control">{{ $single->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 m-t-10">
                                <div class="form-group">
                                    <label for="description">Description</label><small class="req"> *</small>
                                    <textarea name="description" id="description1" class="form-control">{{ $single->description }}</textarea>
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
    <!--Book title Validation-->
    <script>
        $('#title').on('keyup', function() {
            var regx = /^[" "a-zA-Z0-9°!@#\$%\^\&*\)\(+=._-]{3,}$/g;
            if (regx.test($('#title').val())) {
                $(".title-error").fadeOut(100);
            } else {
                $(".title-error").fadeIn();
                $(".title-error").html("<b>Have Error!</b>");
                //$("#title").val('');
            }
        })
    </script>
    <script>
        $(function() {
            //get_view(true);
            summernote();
            function summernote() {
                $('#description1').summernote({
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

            $(document).on('click', '.btnUpdate', function() {
                let Book_id = $(this).data("id");
                $("#Book_id").val(Book_id);

            });
            $("#multiple_img").on('change', function() {
                var fi = document.getElementById('multiple_img');
                if (fi.files.length < 2) {
                    alert("You must upload 2 images for the gallery.");
                    $("#multiple_img").val('');
                    event.preventDefault();
                } else {}
            });
        });
    </script>
    <script>
        $(function() {
            $("#discount_type").on("change", function() {
                let price = $("#price").val();
                let discount = $("#discount").val();
                let discount_type = $(this).val();
                if(discount!=0){
                    if (discount_type == "fixed") {
                        $("#discount_price").val(price - discount);
                    } else {
                        $("#discount_price").val(price - price * discount / 100);
                    }
                }else{
                    $("#discount_price").val(0);
                }
            })
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
    <script !src="">
        $(document).ready(function() {
            get_view(false);
            summernote();

            function summernote() {
                $('#description').summernote({
                    height: 350,
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

            $("#search_key").on("change", function() {
                get_view(false);
                return false;
            });
            $("#filter_by").on("change", function() {
                get_view(false);
                return false;
            });
            $("#search_category_id").on("change", function() {
                get_view(false);
                return false;
            });
            $("#Book_table").on("click", '.pagination li a', function() {
                var page_url = $(this).attr("href");
                if (page_url == "javascript:void(0)") {
                    return false;
                }
                get_view(page_url);
                return false;
            });

            function get_view(page_url) {
                var filter_by = $("#filter_by").val();
                var search_key = $("#search_key").val();
                var search_category_id = $("#search_category_id").val();
                var base_url = "{{ url('admin/Book-view') }}";
                if (page_url) {
                    base_url = page_url;
                }
                $.ajax({
                    url: base_url,
                    type: "get",
                    dataType: "json",
                    data: {
                        "search_key": search_key,
                        "filter_by": filter_by,
                        "search_category_id": search_category_id
                    },
                    beforeSend: function() {
                        $("#Book_loading").fadeIn(300);
                    },
                    success: function(data) {
                        $("#Book_table tbody").html(data.html);
                        $("#Book_loading").fadeOut(300);
                    },
                    error: function(e) {
                        $("#Book_loading").fadeOut(300);
                    }
                });
            }

            //not working now
            $("#Book_table").on("click", "#details_modal", function() {
                var Book_id = $(this).data("id");
                $.ajax({
                    url: "{{ url('admin/Book-details') }}",
                    type: "get",
                    dataType: "json",
                    data: {
                        "Book_id": Book_id
                    },
                    beforeSend: function() {
                        $("#overlay").fadeIn(300);
                    },
                    success: function(data) {
                        $("#show_details").html(data.html);
                        $("#overlay").fadeOut(300);
                    },
                    error: function(e) {
                        $.Notification.autoHideNotify('error', 'top right',
                            "Something Wrong. Please try again");
                        $("#overlay").fadeOut(300);
                    }
                });
            });

            function validate() {
                if (document.form.category_id.value == "" || document.form.item_condition.value == "" || document
                    .form.channel.value == "") {
                    swal("Alert", "Required field can't be Empty", "info", {
                        button: "ok"
                    });
                    alert("Required field can't be Empty");
                    return false;
                }
                return (true);
            }

        });
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
