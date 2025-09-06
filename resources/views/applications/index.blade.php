@extends('include.master')
@section('content')
<div class="content">

    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{ $pageTitle }}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('applications.index') }}"><i class="ti ti-smart-home"></i></a></li>
                    <li class="breadcrumb-item">{{ $pageTitle }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subTitle }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <a href="{{ route('applications.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-circle-plus me-2"></i>Add Application
            </a>
        </div>
    </div>

    <div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
    </div>

    <div class="card">
        <div class="card-body p-3">
            <h5>{{ $pageTitle }}</h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Application Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Officer</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $key => $application)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ optional($application->applicant)->first_name }} {{ optional($application->applicant)->last_name }}</td>
                            <td>{{ $application->application_type }}</td>
                            <td>{{ $application->application_date }}</td>
                            <td>{{ $application->status }}</td>
                            <td>{{ $application->priority }}</td>
                            <td>{{ optional($application->officer)->name }}</td>
                            <td>{{ optional($application->branch)->name }}</td>
                            <td>
                                <a href="{{ route('applications.show', $application->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
