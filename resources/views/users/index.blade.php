@extends('include.master')
@section('content')

<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1">{{$subTitle}}</h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
Superadmin
</li>
<li class="breadcrumb-item active" aria-current="page">{{$subTitle}}</li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<div class="me-2 mb-2">
<div class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
<i class="ti ti-file-export me-1"></i>Export
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
</li>
</ul>
</div>
</div>
<div class="mb-2">
<a href="{{asset('users/create')}}" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add User</a>
</div>
<div class="head-icons ms-2">
<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
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
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> {{Session::get('fail')}}</h4>
</div>
@endif
</div>
<br>
<!-- Performance Indicator list -->
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>Users List</h5>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

<div class="dropdown me-3">
         <select name="role" class="form-select" required>
                                            <option selected disabled value="">Search Role</option>
                                            @foreach($roles as $role)
                                                <option {{ old('role') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->Role }}</option>
                                            @endforeach
                                        </select>
</div>
<div class="dropdown me-3">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
Status
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
</li>
</ul>
</div>
<a href="#" class="btn btn-primary d-flex align-items-center"><i class="ti ti-search me-2"></i>Search</a>
</div>
</div>
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
<thead class="thead-light">
<tr>
<th class="no-sort">
#
</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Created Date</th>
<th>Role</th>
<th>Status</th>
<th></th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>
{{ $loop->iteration }} {{-- This will display the loop number --}}
</td>
<td>
<div class="d-flex align-items-center file-name-icon">
<a href="#" class="avatar avatar-md avatar-rounded">
<img src="{{asset('public/upload/userImge/'.$user->photo)}}" class="img-fluid" alt="img">
</a>
<div class="ms-2">
<h6 class="fw-medium"><a href="#">{{$user->full_name}}</a></h6>
</div>
</div>
</td>
<td>{{$user->email}}</td>
<td>{{$user->phone}}</td>
<td>{{ optional($user->created_at)->format('d M Y') }}</td>
<td>
<span class=" badge badge-md p-2 fs-10 badge-pink-transparent">{{$user->RoleName->Role}}</span>
</td>
<td>
<span class="badge badge-success d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Active
</span>
</td>
<td>
<div class="action-icon d-inline-flex">
<a href="{{route('users.edit',$user->id)}}" class="me-2" ><i class="ti ti-edit"></i></a>
<a href="{{URL::to('users/destroy/'.$user->id)}}" ><i class="ti ti-trash"></i></a>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
<!-- /Performance Indicator list -->

</div>


@endsection