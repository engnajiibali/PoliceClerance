@extends('include.master')

@section('content')
<div class="content">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Add New Crime Case</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Flash Messages -->
    <div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-times"></i> {{ Session::get('fail') }}</h4>
            </div>
        @endif
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h5 class="card-title">Crime Case Form</h5>
            </div>
            <div class="card-body">
                <!-- Form Start -->
                <form method="post" action="{{ route('crimes-cases.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Case Number</label>
                                <input class="form-control" type="text" name="case_number" placeholder="Case Number" value="{{ old('case_number') }}">
                                <span class="text-danger">@error('case_number') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Title</label>
                                <input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title') }}">
                                <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date & Time</label>
                                <input class="form-control" type="datetime-local" name="date_time" value="{{ old('date_time') }}">
                                <span class="text-danger">@error('date_time') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Location</label>
                                <input class="form-control" type="text" name="location" placeholder="Crime Location" value="{{ old('location') }}">
                                <span class="text-danger">@error('location') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Latitude</label>
                                <input class="form-control" type="text" name="latitude" placeholder="Latitude" value="{{ old('latitude') }}">
                                <span class="text-danger">@error('latitude') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Longitude</label>
                                <input class="form-control" type="text" name="longitude" placeholder="Longitude" value="{{ old('longitude') }}">
                                <span class="text-danger">@error('longitude') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Reported By (User ID)</label>
                                <input class="form-control" type="number" name="reported_by" placeholder="User ID" value="{{ old('reported_by') }}">
                                <span class="text-danger">@error('reported_by') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Assigned Officer (User ID)</label>
                                <input class="form-control" type="number" name="assigned_officer" placeholder="Officer ID" value="{{ old('assigned_officer') }}">
                                <span class="text-danger">@error('assigned_officer') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="open" {{ old('status')=='open' ? 'selected' : '' }}>Open</option>
                                    <option value="under_investigation" {{ old('status')=='under_investigation' ? 'selected' : '' }}>Under Investigation</option>
                                    <option value="closed" {{ old('status')=='closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="forwarded_to_court" {{ old('status')=='forwarded_to_court' ? 'selected' : '' }}>Forwarded to Court</option>
                                </select>
                                <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <!-- Multi-select Crime Types -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Crime Types</label>
                                <select name="crime_types[]" class="form-control select2" multiple  data-placeholder="Nooca Kiiska">
                                    @foreach($crimeTypes as $type)
                                        <option value="{{ $type->id }}" {{ (collect(old('crime_types'))->contains($type->id)) ? 'selected':'' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('crime_types') {{ $message }} @enderror</span>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{ route('crimes-cases.index') }}" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- /Form End -->
            </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('select[name="crime_types[]"]').select2({
        placeholder: "Select crime types",
        allowClear: true
    });
});
</script>
@endsection
