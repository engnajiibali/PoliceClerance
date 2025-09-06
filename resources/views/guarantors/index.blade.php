@extends('include.master')
@section('content')
<div class="content">

    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{ $pageTitle }}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-smart-home"></i></a></li>
                    <li class="breadcrumb-item">{{ $pageTitle }}</li>
                    <li class="breadcrumb-item active">{{ $subTitle }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
            <div class="mb-2">
                <a href="{{ route('guarantors.create') }}" class="btn btn-primary">
                    <i class="ti ti-circle-plus me-2"></i>Add Guarantor
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>{{ $subTitle }}</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>National ID</th>
                        <th>Phone</th>
                        <th>Relationship</th>
                        <th>Application</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guarantors as $guarantor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guarantor->full_name }}</td>
                        <td>{{ $guarantor->national_id }}</td>
                        <td>{{ $guarantor->phone }}</td>
                        <td>{{ $guarantor->relationship }}</td>
                        <td>{{ $guarantor->application->application_type ?? '-' }}</td>
                        <td>{{ $guarantor->address }}</td>
                        <td>
                            <a href="{{ route('guarantors.show', $guarantor->id) }}" class="btn btn-sm btn-light"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('guarantors.edit', $guarantor->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-edit"></i></a>
                            <form action="{{ route('guarantors.destroy', $guarantor->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this guarantor?')"><i class="ti ti-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($guarantors->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">No guarantors found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
