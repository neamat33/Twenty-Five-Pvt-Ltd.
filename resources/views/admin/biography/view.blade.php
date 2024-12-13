@extends('admin.layouts.app')
@section('page-title', 'Slider List')

@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between flex-wrap">
                    <h3 class="fw-bold mb-0">Biography List</h3>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <table class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image </th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_all as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                <a href="#" target="_blank">
                                                    <img width="100" src="{{ asset($value->picture) }}" class="img img-thumbnail" />
                                                </a>
                                            </td>
                                            <td>{{ $value->title }}</td>
                                            <td style="display: block">{{ Str::limit(strip_tags($value->short_description), $limit = 150, $end = '......') }}</td>
                                            <td>{{ Str::limit(strip_tags($value->description), $limit = 200, $end = '......') }}</td>
                                            <td class="float-right">
                                                <a href="{{ route('biography.edit', $value->id) }}" title="Edit" class="btn btn-primary btn-xs"><i
                                                        class="fa fa-edit"></i></a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#myDataTable')
            .addClass('nowrap')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
    </script>
@endsection
