@extends('admin.layouts.app')
@section('page-title','Create Distributor')
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
                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="card panel panel-border panel-info">
                            <div class="card-header">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Create address
                                    </a>
                                </h3>
                            </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Video Title</label><small class="req">*</small>
                                                <input required name="title" placeholder="Enter Title"
                                                    type="text" class="form-control" id="title">
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
                                                <label for="link">Youtube Link</label><small class="req">*</small>
                                                <input required name="link"
                                                    type="text" class="form-control" id="title">
                                                @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="title-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group pull-left m-t-22">
                                                <input type="submit" class=" btn btn-primary pull-right" value="Save & Finish"
                                                    name="submit" />
                                            </div>
                                        </div>
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
            <form action="{{ route('videos.update',$single->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                @csrf
                @method("PUT")
                <div class="col-sm-12">
                    <div class="panel-group panel-group-joined custom_panel-group" id="accordion-test">
                        <div class="card panel panel-border panel-info">
                            <div class="card-header">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne"
                                        class="collapsed">
                                        Add Video
                                    </a>
                                </h3>
                            </div>

                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Video Title</label><small class="req">*</small>
                                            <input required name="title" value="{{ $single->title }}" placeholder="Enter Title"
                                                type="text" class="form-control" id="title">
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
                                            <label for="link">Youtube Link</label><small class="req">*</small>
                                            <input required name="link" value="{{ $single->link }}"
                                                type="text" class="form-control" id="title">
                                            @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="title-error text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group pull-left m-t-22">
                                            <input type="submit" class=" btn btn-primary pull-right" value="Save & Finish"
                                                name="submit" />
                                        </div>
                                    </div>
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
@endsection
