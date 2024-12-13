@extends('admin.layouts.app')
@section('page-title','Masala List')
@section('content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                @if (isset($response['message']))
                    <div class="alert alert-success">
                        {{ $response['message'] }}
                    </div>
                @endif
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Masala List</h3>
                    <a href="{{ route('masalahs.create') }}" class="btn btn-info text-white"><i class="fa fa-plus"></i> Add Masala</a>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Question</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_all as $key=> $value)
                                <tr>
                                    <td><strong>{{ ++$key }}</strong></td>
                                    <td>{{ $value->name}}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td> {{ $value->question}}</td>
                                    <td>
                                        <span class="badge {{ $value->status=1 ? 'bg-info' : 'bg-warning' }}">
                                            {{ $value->status=1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('masalahs.edit', encrypt($value->id)) }}" >Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('masalahs.delete', encrypt($value->id)) }}" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                            </li>
                                          </ul>
                                        </div>
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
    .addClass( 'nowrap' )
    .dataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
</script>
@endsection
