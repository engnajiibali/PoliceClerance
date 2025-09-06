@extends('include.master')
@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{$pageTitle}}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href=""><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Superadmin</li>
                    <li class="breadcrumb-item active">{{$pageTitle}}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('crime-types.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Crime Type</a>
        </div>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th width="180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crimeTypes as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->category?->name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>
                            <a href="{{ route('crime-types.show',$type->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('crime-types.edit',$type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('crime-types.destroy',$type->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this record?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $crimeTypes->links() }}
        </div>
    </div>
</div>
@endsection
