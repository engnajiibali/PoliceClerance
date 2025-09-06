@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Edit Applicant</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-sm-4">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name',$applicant->first_name) }}">
                    </div>
                    <div class="col-sm-4">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name',$applicant->middle_name) }}">
                    </div>
                    <div class="col-sm-4">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name',$applicant->last_name) }}">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="{{ old('dob',$applicant->dob) }}">
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male" {{ $applicant->gender=='Male'?'selected':'' }}>Male</option>
                            <option value="Female" {{ $applicant->gender=='Female'?'selected':'' }}>Female</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>National ID</label>
                        <input type="text" name="national_id" class="form-control" value="{{ old('national_id',$applicant->national_id) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone',$applicant->phone) }}">
                    </div>
                    <div class="col-sm-6 mt-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email',$applicant->email) }}">
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control">{{ old('address',$applicant->address) }}</textarea>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label>Region</label>
                        <select name="region_id" class="form-control">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ $applicant->region_id==$region->id?'selected':'' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>District</label>
                        <select name="district_id" class="form-control">
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $applicant->district_id==$district->id?'selected':'' }}>{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label>Branch</label>
                        <select name="branch_id" class="form-control">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $applicant->branch_id==$branch->id?'selected':'' }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label>Photo</label><br>
                        @if($applicant->photo_path)
                            <img src="{{ asset($applicant->photo_path) }}" width="80" class="mb-2">
                        @endif
                        <input type="file" name="photo_path" class="form-control">
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('applicants.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Applicant</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
