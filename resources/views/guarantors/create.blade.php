@extends('include.master')
@section('content')
<div class="content">
    <h2>Add Guarantor</h2>
    <form action="{{ route('guarantors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Application</label>
            <select name="application_id" class="form-control" required>
                <option value="">-- Select Application --</option>
                @foreach($applications as $application)
                <option value="{{ $application->id }}">{{ $application->application_type }} - {{ $application->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Full Name *</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>National ID</label>
            <input type="text" name="national_id" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Relationship</label>
            <input type="text" name="relationship" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
