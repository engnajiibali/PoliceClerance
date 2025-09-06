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
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="head-icons ms-2">
                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header">
                    <i class="ti ti-chevrons-up"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div>
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> {{Session::get('success')}}</h4>
        </div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-times"></i> {{Session::get('fail')}}</h4>
        </div>
        @endif
    </div>
    <br>

    <div class="row">
        <!-- Region List -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>{{$pageTitle}}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Region Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($regions as $region)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $region->name }}</td>
                                    <td>{{ $region->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display:inline-block;" 
                                            onsubmit="return confirm('Are you sure you want to delete this region?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No regions found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Region Form -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Region</h4>
                        </div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="{{ route('regions.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Region Name <strong class="text-danger">*</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Region Name" value="{{ old('name') }}">
                                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('regions.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Region Form -->
    </div>
</div>
@endsection
