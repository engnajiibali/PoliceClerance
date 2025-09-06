@extends('include.master')
@section('content')
<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
<div class="my-auto mb-2">
<h2 class="mb-1">{{ $pageTitle }}</h2>
<nav>
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="{{ route('applicants.index') }}"><i class="ti ti-smart-home"></i></a>
</li>
<li class="breadcrumb-item">{{ $pageTitle }}</li>
<li class="breadcrumb-item active" aria-current="page">{{ $subTitle }}</li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
<a href="{{ route('applicants.create') }}" class="btn btn-primary d-flex align-items-center">
<i class="ti ti-circle-plus me-2"></i>Add Applicant
</a>
</div>
</div>
<!-- /Breadcrumb -->

<div>
@if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
</div>

<div class="card">
<div class="card-body p-3">
<h5>{{ $pageTitle }}</h5>

<div class="table-responsive mt-3">
<table class="table table-bordered">
<thead>
<tr>
<th>#</th>
<th>Full Name</th>
<th>Gender</th>
<th>National ID</th>
<th>Phone</th>
<th>Email</th>
<th>Region</th>
<th>District</th>
<th>Branch</th>
<th>Finger Print</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($applicants as $key => $applicant)
<tr>
<td>{{ $key+1 }}</td>
<td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
<td>{{ $applicant->gender }}</td>
<td>{{ $applicant->national_id }}</td>
<td>{{ $applicant->phone }}</td>
<td>{{ $applicant->email }}</td>
<td>{{ optional($applicant->region)->name }}</td>
<td>{{ optional($applicant->district)->name }}</td>
<td>{{ optional($applicant->branch)->name }}</td>
<td>
@if($applicant->fingerStatus == 0)
<a href="{{ route('finger.collect', $applicant->id) }}" class="btn btn-sm btn-primary">
Collect Finger
</a>
@else
<a href="{{ route('finger.change', $applicant->id) }}" class="btn btn-sm btn-success">
Change Finger
</a>
@endif
</td>

<td>
<a href="{{ route('applicants.show', $applicant->id) }}" class="btn btn-sm btn-light me-1" title="View">
<i class="ti ti-eye"></i>
</a>
<a href="{{ route('applicants.edit',$applicant->id) }}" class="btn btn-sm btn-info">Edit</a>
<form action="{{ route('applicants.destroy',$applicant->id) }}" method="POST" style="display:inline">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this applicant?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>
</div>
@endsection
