@extends('admin.layouts.app')
@section('page-title','Book List')
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
                    <h3 class="fw-bold mb-0">Blog List</h3>
                    <a href="{{ route('blogs.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Blog</a>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key=> $value)
                                <tr>
                                    <td><strong>{{ ++$key }}</strong></td>
                                    <td><img src="{{ asset($value->picture) }}" alt="" width="60" class="img img-thumbnail"></td>
                                    <td>{{ $value->title }}</td>
                                    <td> {!! Str::limit($value->content, 0, 15, 'UTF-8') . (mb_strlen($value->content, 'UTF-8') > 15 ? ' ...' : '') !!}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('blogs.edit', encrypt($value->id)) }}" onclick="return confirm('Are you sure to edit this Book?')">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('blogs.delete', encrypt($value->id)) }}" onclick="return confirm('Are you sure to delete this Book?')">Delete</a>
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
