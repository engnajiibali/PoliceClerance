@extends('include.master')

@section('content')
<div class="content">
    <div class="page-header">
        <h3 class="page-title">Add Application History</h3>
    </div>

    <form action="{{ route('application_history.store') }}" method="POST">
        @csrf
        <div class="row">

            <!-- Application -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Application</label>
                    <select class="form-control" name="application_id">
                        <option value="">Select Application</option>
                        @foreach($applications as $app)
                            <option value="{{ $app->id }}" {{ old('application_id') == $app->id ? 'selected' : '' }}>
                                {{ $app->application_type }} ({{ $app->id }})
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('application_id') {{ $message }} @enderror</span>
                </div>
            </div>

            <!-- Old Status -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Old Status</label>
                    <input type="text" class="form-control" name="old_status" value="{{ old('old_status') }}">
                    <span class="text-danger">@error('old_status') {{ $message }} @enderror</span>
                </div>
            </div>

            <!-- New Status -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>New Status</label>
                    <input type="text" class="form-control" name="new_status" value="{{ old('new_status') }}">
                    <span class="text-danger">@error('new_status') {{ $message }} @enderror</span>
                </div>
            </div>

            <!-- Changed By -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Changed By</label>
                    <select class="form-control" name="changed_by">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('changed_by') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('changed_by') {{ $message }} @enderror</span>
                </div>
            </div>

            <!-- Remarks -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea>
                    <span class="text-danger">@error('remarks') {{ $message }} @enderror</span>
                </div>
            </div>

        </div>

        <div class="mt-3">
            <a href="{{ route('application_history.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
