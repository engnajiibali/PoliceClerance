@extends('include.master')
@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
    <div class="my-auto mb-2">
        <h2 class="mb-1">{{$pageTitle}}</h2>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="ti ti-smart-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    {{$subTitle}}
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$subTitle}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-sm-10 mx-auto">
        <a href="{{asset('admin/')}}" class="back-icon d-flex align-items-center fs-12 fw-medium mb-3 d-inline-flex">
            <span class=" d-flex justify-content-center align-items-center rounded-circle me-2">
                <i class="ti ti-arrow-left"></i>
            </span>
            Back to List
        </a>
        <div class="card">
            <div class="card-body">

                <!-- Company Detail -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Company Detail</h4>
                    </div>
                    <div class="modal-body pb-0">
                        <form id="pForm" class="form-vertical" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center flex-wrap bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0">
                                            <!-- Display existing image or default if not set -->
                                            <img src="{{ asset('public/upload/userImge/' .($user->photo ?? 'userimg.PNG')) }}" alt="Profile Image" class="rounded-circle">
                                        </div>
                                        <div class="profile-upload">
                                            <h6 class="mb-1">Upload Profile Image</h6>
                                            <p class="fs-12">Image should be below 4MB</p>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Upload
                                                    <input type="file" name="userImage" class="form-control">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>
                                            <span class="text-danger">@error('userImage') {{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name <strong class="text-danger">*</strong></label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name', $user->full_name) }}">
                                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone', $user->phone) }}">
                                        <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email <strong class="text-danger">*</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $user->email) }}">
                                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Role <strong class="text-danger">*</strong></label>
                                        <select name="role" class="form-select" required>
                                            <option selected disabled value="">Search Role</option>
                                            @foreach($roles as $role)
                                                <option {{ old('role', $user->role_id) == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->Role }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('role') {{ $message }} @enderror</span>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Company Detail -->

            </div>
        </div>
    </div>
</div>

@endsection
