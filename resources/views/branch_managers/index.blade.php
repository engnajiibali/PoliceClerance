@extends('include.master')
@section('title', 'Branch Managers')
@section('content')
<div class="container-fluid">

    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0">Branch Managers</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Branch Managers</li>
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
            <a class="nav-link" href="{{ route('branches.index') }}"><i class="ti ti-settings me-2"></i>Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sub_branches.index') }}"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>Sub Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('branch_managers.index') }}"><i class="ti ti-settings-2 me-2"></i>Branch Managers</a>
        </li>
    </ul>

    <div class="row">
        <!-- Branch Manager List -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header"><h5>Branch Managers List</h5></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Sub Branch</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($managers as $manager)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $manager->User->full_name }}</td>
                                    <td>{{ $manager->branch->name ?? '-' }}</td>
                                    <td>{{ $manager->subBranch->name ?? '-' }}</td>
                                    <td>{{ $manager->created_at->diffForHumans() }}</td>
                                   
                                </tr>
                                @php $i++; @endphp
                                @empty
                                <tr><td colspan="6" class="text-center">No branch managers found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Branch Manager -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="mb-3">Add Branch Manager</h4>
                    <form method="POST" action="{{ route('branch_managers.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Manager Name <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="name" placeholder="Manager Name" value="{{ old('name') }}">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>
<div class="mb-3">
                            <label class="form-label">Select User <strong class="text-danger">*</strong></label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="">-- Select User --</option>
                                @foreach($users as $users)
                                    <option value="{{ $users->id }}">{{ $users->full_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('user_id') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Branch <strong class="text-danger">*</strong></label>
                            <select class="form-control" name="branch_id" id="branchSelect">
                                <option value="">-- Select Branch --</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('branch_id') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Sub Branch <strong class="text-danger">*</strong></label>
                            <select class="form-control" name="sub_branch_id" id="subBranchSelect">
                                <option value="">-- Select Sub Branch --</option>
                                @foreach($subBranches as $subBranch)
                                    <option value="{{ $subBranch->id }}">{{ $subBranch->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('sub_branch_id') {{ $message }} @enderror</span>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('branch_managers.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
