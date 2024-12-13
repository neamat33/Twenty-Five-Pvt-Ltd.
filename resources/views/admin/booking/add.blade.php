@extends('admin.layouts.app')
@section('page-title', 'Create booking')
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
                @isset($add)
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validate();">
                        @csrf
                        <div class="col-sm-12">
                            <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                                <div class="panel panel-border panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                                class="collapsed">
                                                Create Booking
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="title"> Concact Person</label><small class="req">*</small>
                                                    <input required name="name" placeholder="Concact Person Name"
                                                        type="text" class="form-control" id="title">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="name-error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="price">Phone </label><small class="req">*</small>
                                                    <input type="text" name="phone" placeholder="Enter Contact Number"
                                                        class="form-control" onKeyPress="return isNumber(event)" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="price">Email</label>
                                                    <input name="email" placeholder="example@gmail.com" type="email"
                                                        class="form-control">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="price">Date </label><small class="req">*</small>
                                                    <input type="date" name="date"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 m-t-10">
                                        <div class="form-group">
                                            <label for="description">Location Details</label><small class="req">
                                                *</small>
                                            <textarea name="location"  id="location" class="form-control" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t-10">
                                        <div class="form-group">
                                            <label for="description">Description</label><small class="req"> *</small>
                                            <textarea name="description" id="description1" class="form-control" required></textarea>
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
                @endisset
            </div>
        </div> <!-- End row -->
        <div class="row">
            @isset($edit)
                <form action="{{ route('bookings.update', $single->id) }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validate();">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                            class="collapsed">
                                            Edit booking
                                        </a>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title"> Concact Person</label><small class="req">*</small>
                                                <input required name="name" value="{{ $single->name }}"
                                                    type="text" class="form-control" id="title">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="name-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price">Phone </label><small class="req">*</small>
                                                <input type="text" name="phone" value="{{ $single->phone }}" placeholder="Enter Contact Number"
                                                    class="form-control" onKeyPress="return isNumber(event)" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price">Email</label>
                                                <input name="email" placeholder="example@gmail.com" type="email"
                                                    class="form-control" value="{{ $single->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price">Date </label><small class="req">*</small>
                                                <input type="date" name="date" value="{{ date('Y-m-d', strtotime($single->date)) }}"
                                                    class="form-control" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 m-t-10">
                                    <div class="form-group">
                                        <label for="description">Location Details</label><small class="req">
                                            *</small>
                                        <textarea name="location"  id="location" class="form-control" required>{{ $single->location}}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 m-t-10">
                                    <div class="form-group">
                                        <label for="description">Description</label><small class="req"> *</small>
                                        <textarea name="description" id="description1" class="form-control" required>{{ $single->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input @if($single->status == "1") @checked(true) @endif type="checkbox" name="status" >&nbsp; Confirm
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
    <!--booking title Validation-->
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
                let booking_id = $(this).data("id");
                $("#booking_id").val(booking_id);

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
                if (discount != 0) {
                    if (discount_type == "fixed") {
                        $("#discount_price").val(price - discount);
                    } else {
                        $("#discount_price").val(price - price * discount / 100);
                    }
                } else {
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
            $("#booking_table").on("click", '.pagination li a', function() {
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
                var base_url = "{{ url('admin/booking-view') }}";
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
                        $("#booking_loading").fadeIn(300);
                    },
                    success: function(data) {
                        $("#booking_table tbody").html(data.html);
                        $("#booking_loading").fadeOut(300);
                    },
                    error: function(e) {
                        $("#booking_loading").fadeOut(300);
                    }
                });
            }

            //not working now
            $("#booking_table").on("click", "#details_modal", function() {
                var booking_id = $(this).data("id");
                $.ajax({
                    url: "{{ url('admin/booking-details') }}",
                    type: "get",
                    dataType: "json",
                    data: {
                        "booking_id": booking_id
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
