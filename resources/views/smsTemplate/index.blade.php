@extends('include.master')

@section('content')
<div class="content">

<!-- Breadcrumb -->
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
<h4><i class="icon fa fa-check"></i> {{Session::get('fail')}}</h4>
</div>
@endif
</div>
<br>

<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1">{{ $pageTitle }}</h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">{{ $pageTitle }}</li>
<li class="breadcrumb-item active" aria-current="page">{{ $supTitle }}</li>
</ol>
</nav>
</div>

<div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
<!-- Add Template Button -->
<div class="mb-2">
<a href="{{ route('smsTemplate.create') }}" class="btn btn-primary d-flex align-items-center">
<i class="ti ti-circle-plus me-2"></i>Add Template
</a>
</div>

<!-- Collapse Header Icon -->
<div class="head-icons ms-2">
<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header">
<i class="ti ti-chevrons-up"></i>
</a>
</div>
</div>
</div>
<!-- /Breadcrumb -->

<!-- SMS Templates Grid -->
<div class="row">
@foreach ($templates as $template)
<div class="col-md-6 col-xl-4 mb-4">
<div class="card shadow-sm border-0 h-100">
<!-- Template Name Header -->
<div class="card-header text-center bg-primary text-white rounded-top">
<h5 class="mb-0">{{ $template->name }}</h5>
</div>

<!-- Template Body and Actions -->
<div class="card-body d-flex flex-column justify-content-between">
<!-- Body Preview -->
<p class="mb-3">{{ Str::limit(strip_tags($template->body), 70) }}</p>

<!-- Action Buttons -->
<div class="d-flex justify-content-between mt-auto">
<a href="{{ route('smsTemplate.edit', $template->id) }}" class="btn btn-sm btn-outline-primary">
<i class="ti ti-edit"></i> Edit
</a>

<form action="{{ route('smsTemplate.destroy', $template->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this template?');">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-outline-danger">
<i class="ti ti-trash"></i> Delete
</button>
</form>
</div>
</div>
</div>
</div>
@endforeach
</div>
<!-- /SMS Templates Grid -->

</div>
@endsection
