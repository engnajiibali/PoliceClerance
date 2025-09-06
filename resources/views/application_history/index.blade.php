@extends('include.master')

@section('content')
<div class="content">
    <div class="page-header">
        <h3 class="page-title">Application History</h3>
        <a href="{{ route('application_history.create') }}" class="btn btn-primary float-end">Add History</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Application</th>
                <th>Old Status</th>
                <th>New Status</th>
                <th>Changed By</th>
                <th>Changed At</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
            <tr>
                <td>{{ $history->id }}</td>
                <td>{{ $history->application->application_type ?? '-' }}</td>
                <td>{{ $history->old_status }}</td>
                <td>{{ $history->new_status }}</td>
                <td>{{ $history->user->name ?? '-' }}</td>
                <td>{{ $history->changed_at }}</td>
                <td>{{ $history->remarks }}</td>
                <td>
                    <a href="{{ route('application_history.edit', $history->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('application_history.destroy', $history->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
