@extends('include.master')

@section('content')
<div class="content">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Edit Crime Case</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

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
                    <h5 class="card-title">Update Crime Case</h5>
                </div>
                <div class="card-body">
                    <!-- Form Start -->
                    <form id="caseForm" method="post" action="{{ route('crimecases.update', $crimecase->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Case Number</label>
                                    <input class="form-control" type="text" name="case_number" 
                                           value="{{ old('case_number', $crimecase->case_number) }}" placeholder="Enter Case Number">
                                    <span class="text-danger">@error('case_number') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input class="form-control" type="text" name="title" 
                                           value="{{ old('title', $crimecase->title) }}" placeholder="Case Title">
                                    <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Case Description">{{ old('description', $crimecase->description) }}</textarea>
                                    <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date & Time</label>
                                    <input class="form-control" type="datetime-local" name="date_time" 
                                           value="{{ old('date_time', $crimecase->date_time) }}">
                                    <span class="text-danger">@error('date_time') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Location</label>
                                    <input class="form-control" type="text" name="location" 
                                           value="{{ old('location', $crimecase->location) }}" placeholder="Case Location">
                                    <span class="text-danger">@error('location') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Latitude</label>
                                    <input class="form-control" type="text" name="latitude" 
                                           value="{{ old('latitude', $crimecase->latitude) }}" placeholder="Latitude">
                                    <span class="text-danger">@error('latitude') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Longitude</label>
                                    <input class="form-control" type="text" name="longitude" 
                                           value="{{ old('longitude', $crimecase->longitude) }}" placeholder="Longitude">
                                    <span class="text-danger">@error('longitude') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Reported By</label>
                                    <input class="form-control" type="text" name="reported_by" 
                                           value="{{ old('reported_by', $crimecase->reported_by) }}" placeholder="Reporter Name">
                                    <span class="text-danger">@error('reported_by') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Assigned Officer</label>
                                    <input class="form-control" type="text" name="assigned_officer" 
                                           value="{{ old('assigned_officer', $crimecase->assigned_officer) }}" placeholder="Officer Name">
                                    <span class="text-danger">@error('assigned_officer') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Open" {{ old('status', $crimecase->status) == 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="Closed" {{ old('status', $crimecase->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                                        <option value="Pending" {{ old('status', $crimecase->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                    <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <br>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="{{ route('crimecases.index') }}" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
