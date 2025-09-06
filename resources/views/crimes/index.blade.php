@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Applications Crime Check</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if(Session::has('found'))
        <div class="alert alert-warning">Crime record already exists! Status: {{ Session::get('found') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Application ID</th>
                <th>Applicant Name</th>
                <th>Phone</th>
                <th>Crime Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
                @php
                    $crime = $crimes->where('application_id', $app->id)->first();
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->applicant->FullName ?? '-' }}</td>
                    <td>{{ $app->applicant->Phone ?? '-' }}</td>
                    <td>
                        @if($crime)
                            @if($crime->status == 'verified')
                                <span class="badge bg-success">Verified</span>
                            @elseif($crime->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($crime->status) }}</span>
                            @endif
                        @else
                            <span class="badge bg-secondary">Not Found</span>
                        @endif
                    </td>
                    <td>
                        @if($crime)
                            <button class="btn btn-secondary" disabled>Checked</button>
                        @else
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateModal{{ $app->id }}">
                              Generate Certificate
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="generateModal{{ $app->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $app->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $app->id }}">Confirm Certificate Generation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to generate a crime certificate for <strong>{{ $app->applicant->FullName ?? '-' }}</strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('crimes.check', $app->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Yes, Generate</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
