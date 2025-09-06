@extends('include.master')
@section('content')
<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1">Settings</h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
Administration
</li>
<li class="breadcrumb-item active" aria-current="page">Settings</li>
</ol>
</nav>
</div>
<div class="head-icons ms-2">
<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
<i class="ti ti-chevrons-up"></i>
</a>
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
<ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
<li class="nav-item">
<a class="nav-link" href="{{asset('setting')}}"><i class="ti ti-settings me-2"></i>General Settings</a>
</li>
<li class="nav-item">
<a class="nav-link active" href="{{asset('sms/create')}}"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>SMS Configuration</a>
</li>
</ul>
<div class="row">
<div class="col-xl-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column list-group settings-list">
<a href="{{asset('setting')}}" class="d-inline-flex align-items-center rounded py-2 px-3">General Settings</a>
<a href="{{asset('sms/create')}}" class="d-inline-flex align-items-center rounded py-2 px-3">SMS Configuration</a>
</div>
</div>
</div>
</div>
<div class="col-xl-9">
<div class="card">
<div class="card-body">
<div class="border-bottom mb-3 pb-3">
<h4>Profile Settings</h4>
</div>
<form  method="post" action="{{ route('sms.update', $sms_apis->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')<div class="border-bottom mb-3">
<div class="row">

</div>
<div class="row">
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Username</label>
</div>
<div class="col-md-8">
<input type="text" id="username" name="username" class="form-control" 
   value="{{ old('username', $sms_apis->UserName) }}">
<span class="text-danger">@error('UserName') {{$message}} @enderror</span>
</div>
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Password</label>
</div>
<div class="col-md-8">
<input type="text" id="password" name="password" class="form-control" 
   value="{{ old('password', $sms_apis->Password) }}">
<span class="text-danger">@error('password') {{$message}} @enderror</span>
</div>
</div>
</div>
</div>
</div>
<div class="d-flex align-items-center justify-content-end">
<button type="button" class="btn btn-outline-light border me-3">Cancel</button>
<button type="submit" class="btn btn-primary">Save</button>
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
