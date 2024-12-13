@extends('admin.layouts.app')
@section('page-title','Category List')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Category List</h3>
                        <a href="{{ route('categories.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
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
                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_all as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Use $loop->iteration for accurate numbering -->
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <span class="badge {{ $value->status ? 'bg-info' : 'bg-warning' }}">
                                                {{ $value->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('categories.edit', $value->id) }}" class="btn btn-primary btn-xs" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('categories.delete', $value->id) }}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure to delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
