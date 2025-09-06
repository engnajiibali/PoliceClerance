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
<a class="nav-link active" href="{{asset('setting')}}"><i class="ti ti-settings me-2"></i>General Settings</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{asset('sms/create')}}"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>SMS Configuration</a>
</li>

<!-- 	<li class="nav-item">
<a class="nav-link" href="custom-css.html"><i class="ti ti-settings-2 me-2"></i>Other Settings</a>
</li> -->
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
<form  method="post" action="{{route('setting.update',$settings->id)}}" enctype="multipart/form-data">
@csrf
@method('put')
<div class="border-bottom mb-3">
<div class="row">
<div class="col-md-12">
<div>					
<h6 class="mb-3">Basic Information</h6>
<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
<div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
<img src="{{asset('public/upload/logo/'.$settings->Logo)}}">
</div>                                              
<div class="profile-upload">
<div class="mb-2">
<h6 class="mb-1">Profile Photo</h6>
<p class="fs-12">Recommended image size is 40px x 40px</p>
</div>
<div class="profile-uploader d-flex align-items-center">
<div class="drag-upload-btn btn btn-sm btn-primary me-2">
Upload
<input type="file" class="form-control image-sign" id="logo" name="logo">
</div>
<a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Company Name</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="bus_name" name="bus_name" placeholder="business Name" value="{{$settings->name}}">
<span class="text-danger">@error('bus_name') {{$message}} @enderror</span>
</div>
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Initial</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="initName" name="initName" type="text" placeholder="Initial" value="{{$settings->InitialName}}">
<span class="text-danger">@error('initName') {{$message}} @enderror</span>
</div>
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Email</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="bus_email" name="bus_email" placeholder="business Email" value="{{$settings->Email}}">
<span class="text-danger">@error('bus_email') {{$message}} @enderror</span>
</div>
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Phone</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="bus_phone" name="bus_phone" placeholder="business Phone" value="{{$settings->Telephone}}">
<span class="text-danger">@error('bus_phone') {{$message}} @enderror</span>
</div>
</div>
</div>
</div>
</div>
<div class="border-bottom mb-3">
<h6 class="mb-3">Address Information</h6>
<div class="row">
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Address</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="bus_address" name="bus_address" placeholder="Enter ..." value="{{$settings->Address}}">
<span class="text-danger">@error('bus_address') {{$message}} @enderror</span>
</div>	
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Website</label>
</div>
<div class="col-md-8">
<input type="text" class="form-control" id="bus_Website" name="bus_Website" placeholder="business Website" value="{{$settings->Website}}">
<span class="text-danger">@error('bus_Website') {{$message}} @enderror</span>
</div>	
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Currency Symbol </label>
</div>
<div class="col-md-8">
<input type="text" class="form-control"  id="cur_sym" name="cur_sym"  placeholder="USD,ERO" value="{{$settings->cur_sym}}">
<span class="text-danger">@error('cur_sym') {{$message}} @enderror</span>
</div>	
</div>
</div>
<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Currency </label>
</div>
<div class="col-md-8">
<input type="text" class="form-control"  id="cur_taxt" name="cur_taxt"  placeholder="USD,ERO" value="{{$settings->cur_taxt}}">
<span class="text-danger">@error('cur_taxt') {{$message}} @enderror</span>
</div>	
</div>
</div>


<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Decimal Point  </label>
</div>
<div class="col-md-8">
<input type="text" class="form-control"  id="Decimal_Point" name="Decimal_Point"  placeholder="Decimal Point"value="{{$settings->show_number_after_decimal}}">
<span class="text-danger">@error('Decimal_Point') {{$message}} @enderror</span>

</div>	
</div>
</div>

<div class="col-md-6">
<div class="row align-items-center mb-3">
<div class="col-md-4">
<label class="form-label mb-md-0">Business Start Date </label>
</div>
<div class="col-md-8">
<input type="date" class="form-control" id="startDate" name="startDate"  placeholder="0.00"  value="{{$settings->start_date}}">
<span class="text-danger">@error('startDate') {{$message}} @enderror</span>
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

@endsection
