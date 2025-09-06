@extends('include.master')
@section('content')
<div class="content">
    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{$pageTitle}}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href=""><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Superadmin
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Alert Messages -->
    <div>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> {{ Session::get('fail') }}</h4>
        </div>
        @endif
    </div>

    <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-6 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Crime Category</h4>
                        </div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="{{ route('crime-categories.update', $crimeCategory->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category Name <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{ old('name', $crimeCategory->name) }}">
                                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3">{{ old('description', $crimeCategory->description) }}</textarea>
                                    <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('crime-categories.index') }}" type="button" class="btn btn-outline-light border me-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
