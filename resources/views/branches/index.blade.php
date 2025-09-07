@extends('include.master')
@section('title', 'Branches')
@section('content')
<div class="container-fluid">

    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0">Branches</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Branches</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Alerts -->
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
   <!-- Tabs -->
    <ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('branches.index') }}"><i class="ti ti-settings me-2"></i>Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sub_branches.index') }}"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>Sub Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('branch_managers.index') }}"><i class="ti ti-settings-2 me-2"></i>Branch Managers</a>
        </li>
    </ul>
    <div class="row">
        <!-- Branch List -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header">
                    <h5>Branches List</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>District</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @forelse ($branches as $branch)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>{{ $branch->district->name ?? '-' }}</td>
                                    <td>{{ $branch->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No branches found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Branch -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="mb-3">Add Branch</h4>
                    <form method="POST" action="{{ route('branches.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Branch Name <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="name" placeholder="Branch Name" value="{{ old('name') }}">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select District <strong class="text-danger">*</strong></label>
                            <select class="form-control select2" name="district_id">
                                <option value="">-- Select District --</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('district_id') {{ $message }} @enderror</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('branches.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
