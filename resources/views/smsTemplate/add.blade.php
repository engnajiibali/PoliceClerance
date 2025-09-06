@extends('include.master')

@section('content')
<div class="content">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Create SMS Template</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{asset('dashboard/')}}"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        SMS Templates
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div class="mb-2">
            <a href="{{ route('smsTemplate.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Template Form -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">New SMS Template</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('smsTemplate.store') }}" method="POST">
                        @csrf

                        <!-- Template Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Template Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="Enter template name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Template Body -->
                        <div class="mb-3">
                            <label for="body" class="form-label">Message Body <span class="text-danger">*</span></label>
                            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror"
                                      rows="5" placeholder="Write the message content here..." required>{{ old('body') }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="ti ti-check"></i> Save Template
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Template Form -->

</div>
@endsection
