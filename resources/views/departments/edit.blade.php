@extends('include.master')
@section('content')
<div class="content">
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1">{{$pageTitle}}</h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
{{$pageTitle}}
</li>
<li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
</ol>
</nav>
</div>
</div>

<div class="row">
<div class="col-sm-10 mx-auto">
<a href="{{asset('payment_methods/')}}" class="back-icon d-flex align-items-center fs-12 fw-medium mb-3 d-inline-flex">
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
<h4 class="modal-title">Edit Department</h4>
</div>
<hr>
<div class="modal-body pb-0">
<form method="post" action="{{route('departments.update', $department->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')  
<div class="row">


<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Department Name <strong class="text-danger">*</strong></label>
<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name) }}">
<span class="text-danger">@error('name') {{ $message }} @enderror</span>
</div>
</div>


</div>




<div class="d-flex align-items-center justify-content-end">
<a href="{{ route('departments.index') }}" type="button" class="btn btn-outline-light border me-3">Cancel</a>
<button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
<!-- /Company Detail -->

</div>
</div>
</div>
</div>
</div>
@endsection
