@extends('include.master')

@section('content')
<div class="content">
    <div class="page-header">
        <h3 class="page-title">Certificates List</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Certificate Number</th>
                <th>Applicant</th>
                <th>Application ID</th>
                <th>Issue Date</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificates as $cert)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cert->certificate_number }}</td>
                <td>{{ $cert->application->applicant->FullName ?? '-' }}</td>
                <td>{{ $cert->application->id ?? '-' }}</td>
                <td>{{ $cert->issue_date }}</td>
                <td>{{ $cert->expiry_date }}</td>
                <td>{{ $cert->status }}</td>
                <td>
                    <a href="{{ route('certificates.show', $cert->id) }}" class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
