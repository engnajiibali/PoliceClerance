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
<a href="{{ route('person.grid') }}" class="btn btn-icon btn-sm">
<i class="ti ti-layout-grid"></i>
</a>


</div>
</div>
<div class="me-2 mb-2">
<div class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
<i class="ti ti-file-export me-1"></i>Export/Import
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
<a href="{{asset('fingerPrint/create')}}"  class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Enroll Finger Print</a>
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
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> {{Session::get('fail')}}</h4>
</div>
@endif
</div>
<br>
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>{{$subTitle}}</h5>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
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
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
<thead class="thead-light">
<tr>
<th>
#No
</th>
<th>Name</th>
<th>Finger</th>
<th>Register Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($fingers as $finger)
<tr>
<td>
{{ $loop->iteration }} {{-- This will display the loop number --}}
</td>
<td>Magaca Qofka Farahaan iska leh</td>




<td>{{ \Carbon\Carbon::parse($finger->created_at)->format('d M Y') }}</td>

<td>
<div class="action-icon d-inline-flex align-items-center">
<!-- View -->
<a href="{{ route('fingerPrint.show', 25) }}" class="btn btn-sm btn-light me-1" title="View">
<i class="ti ti-eye"></i>
</a>

<!-- Edit -->
<a href="{{ route('fingerPrint.edit', $finger->id) }}" class="btn btn-sm btn-light me-1" title="Edit">
<i class="ti ti-edit"></i>
</a>

<!-- Delete -->
<form method="POST" action="{{ route('fingerPrint.destroy', $finger->id) }}" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-light" title="Delete" onclick="return confirm('Are you sure you want to delete this person?')">
<i class="ti ti-trash"></i>
</button>
</form>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="row">
<div class="col-sm-12 col-md-5">
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
Showing {{ $fingers->firstItem() ?? 0 }} to {{ $fingers->lastItem() ?? 0 }} of {{ $enteries }} entries
</div>
</div>
<div class="col-sm-12 col-md-7">
<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
<ul class="pull-right pagination">{{ $fingers->links() }}</ul>
</div></div></div>
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