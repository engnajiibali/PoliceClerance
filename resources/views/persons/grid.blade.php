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
<a href="index.html"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">
{{$pageTitle}}
</li>
<li class="breadcrumb-item active" aria-current="page">{{$subTitle}}</li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<div class="me-2 mb-2">
<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
<a href="{{asset('persons/')}}" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
<a href="{{asset('person/grid')}}" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
</div>
</div>
<div class="me-2 mb-2">
<div class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
<i class="ti ti-file-export me-1"></i>Export
</a>
<ul class="dropdown-menu  dropdown-menu-end p-3">
<li data-bs-toggle="modal" data-bs-target="#import-model">
<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Import as Excel</a>
</li>
<li>
<a href="{{ route('persons.export') }}" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
</li>
</ul>
</div>
</div>
<div class="mb-2">
<a href="{{route('persons.create')}}"  class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add person</a>
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
<div class="row">

<!-- Total Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">Total Employee</p>
<h4>{{$AllPersons}}</h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-purple badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Total Plans -->

<!-- Total Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
<h4>{{$ActivePersons}}</h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-primary badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Total Plans -->

<!-- Inactive Plans -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
<h4>{{$inActivePersons}}</h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-dark badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /Inactive Companies -->

<!-- No of Plans  -->
<div class="col-lg-3 col-md-6 d-flex">
<div class="card flex-fill">
<div class="card-body d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center overflow-hidden">
<div>
<span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
</div>
<div class="ms-2 overflow-hidden">
<p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
<h4>{{$NewJoiners}}</h4>
</div>
</div>
<div>                                    
<span class="badge badge-soft-secondary badge-sm fw-normal">
<i class="ti ti-arrow-wave-right-down"></i>
+19.01%
</span>
</div>
</div>
</div>
</div>
<!-- /No of Plans -->
</div>
<div class="card">
<div class="card-body p-3">

<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>{{$pageTitle}}</h5>
<div class="d-flex align-items-center flex-wrap row-gap-3">
<form action="{{ route('persons.search') }}" method="POST" class="d-flex align-items-center flex-wrap gap-2 mb-3">
@csrf
<div class="me-3">
<input type="email" name="email" placeholder="Search By email" class="form-control" value="{{ old('email') }}">
</div>
<div class="me-3">
<input type="number" name="phone" placeholder="Search By phone" class="form-control" value="{{ old('phone') }}">
</div>
<div class="me-3">
<input type="text" name="name" placeholder="Search By Name" class="form-control" value="{{ old('name') }}">
</div>
<div class="me-3">
<select name="status" class="form-select">
<option value="">Select Status</option>
<option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
<option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
</select>
</div>
<div>
<button type="submit" class="btn btn-primary">
<i class="ti ti-search me-1"></i>Search Now
</button>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Clients Grid -->
<div class="row">

@foreach($persons as $person)
<div class="col-xl-3 col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<div class="d-flex justify-content-between align-items-start mb-2">
<div class="form-check form-check-md">
@if ($person->status=="Active")
<span class="badge badge-success d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Active
</span>
@else

<span class="badge badge-danger d-inline-flex align-items-center badge-xs">
<i class="ti ti-point-filled me-1"></i>Inactive
</span>
@endif
</div>
<div>
<a href="{{ route('persons.show', $person->id) }}" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
<img src="{{ asset('public/upload/personImg/' .$person->image) }}" class="img-fluid h-auto w-auto" alt="img">
</a>
</div>
<div class="dropdown">
<button class="btn btn-icon btn-sm rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<i class="ti ti-dots-vertical"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end p-3">
<li>
<a class="dropdown-item rounded-1" href="{{ route('persons.edit', $person->id) }}">
<i class="ti ti-eye me-1"></i>Edit Person
</a>
</li>

<li><hr class="dropdown-divider"></li>
<li>
<form action="{{ route('persons.destroy', $person->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="dropdown-item text-danger rounded-1" onclick="return confirm('Are you sure you want to delete this person?')">
<i class="ti ti-trash me-1"></i>Delete
</button>
</form>
</li>
</ul>
</div>

</div>
<div class="text-center mb-3">
<h6 class="mb-1"><a href="{{ route('persons.show', $person->id) }}">{{ $person->FullName }}</a></h6>
<span class="badge bg-pink-transparent fs-10 fw-medium"><span class="fs-12">
    @if($person->Gender == 'Male')
        <i class="ti ti-mars text-success"></i> Male
    @elseif($person->Gender == 'Female')
        <i class="ti ti-venus text-danger"></i> Female
    @else
        {{ $person->Gender }}
    @endif
</span></span>
</div>
<div class="row text-center">
<div class="col-6">
<div class="mb-3">
<span class="fs-12">Joining Date</span>
<h6 class="fw-medium">{{ \Carbon\Carbon::parse($person->created_at)->format('d M Y') }}</h6>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<span class="fs-12">Phone Number</span>
<h6 class="fw-medium">{{ $person->Phone }}</h6>
</div>
</div>

</div>
</div>
</div>

</div>
@endforeach
<div class="col-md-12">
<div class="text-center mb-4">
{{ $persons->links() }}
</div>
</div>

</div>

</div>

<!-- Import Model -->
<div class="modal fade custom-modal" id="import-model">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content doctor-profile">
<div class="modal-header d-flex align-items-center justify-content-between border-bottom">
<h5 class="modal-title">Persons Import</h5>
<a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
</div>
<div class="modal-body p-4">
<form action="{{ route('persons.import') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label">Import File <span class="text-danger">*</span></label>
<div class="pass-group">
<input type="file" class="pass-input form-control" name="importFile">
<span class="text-danger">@error('importFile') {{ $message }} @enderror</span>
</div>
</div>


</div>
<div class="modal-footer border-top">
<div class="acc-submit">
<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
<button class="btn btn-primary" type="submit">Import</button>
</div>
</div>
</form>
</div>
</div>
</div>
<!-- /Import Model -->
@if ($errors->has('importFile'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var importModal = new bootstrap.Modal(document.getElementById('import-model'));
        importModal.show();
    });
</script>
@endif
@endsection