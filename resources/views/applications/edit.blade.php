@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Edit Application</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('applications.update', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-sm-4">
                        <label>Applicant</label>
                        <select name="applicant_id" class="form-control">
                            @foreach($applicants as $applicant)
                                <option value="{{ $applicant->id }}" {{ $application->applicant_id==$applicant->id?'selected':'' }}>
                                    {{ $applicant->first_name }} {{ $applicant->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label>Application Type</label>
                        <input type="text" name="application_type" class="form-control" value="{{ old('application_type',$application->application_type) }}">
                    </div>

                    <div class="col-sm-4">
                        <label>Application Date</label>
                        <input type="date" name="application_date" class="form-control" value="{{ old('application_date',$application->application_date) }}">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="{{ old('status',$application->status) }}">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Priority</label>
                        <input type="text" name="priority" class="form-control" value="{{ old('priority',$application->priority) }}">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Officer</label>
                        <select name="officer_id" class="form-control">
                            @foreach($officers as $officer)
                                <option value="{{ $officer->id }}" {{ $application->officer_id==$officer->id?'selected':'' }}>{{ $officer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Branch</label>
                        <select name="branch_id" class="form-control">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $application->branch_id==$branch->id?'selected':'' }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control">{{ old('remarks',$application->remarks) }}</textarea>
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('applications.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Application</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
