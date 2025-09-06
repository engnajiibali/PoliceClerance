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
Superadmin
</li>
<li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
</ol>
</nav>
</div>
<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">


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
<!-- Performance Indicator list -->
<div class="row">

<!-- Recently Registered -->
<div class="col-xxl-8 col-xl-8 d-flex">
<div class="card w-100">

<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
<h5>Payment Methods List</h5>

</div>
<div class="card-body p-0">
<div class="custom-datatable-filter table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Campaign Name</th>
            <th>SMS Type</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @forelse ($Messages as $sms)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $sms->campign_name }}</td>
                <td>{{ $sms->SmsType }}</td>
                <td>{{ $sms->created_at->diffForHumans() }}</td>
                <td>
                    <!-- View Button -->
                    <a href="{{ route('sms.show', $sms->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('sms.destroy', $sms->id) }}" method="POST" style="display:inline-block;" 
                          onsubmit="return confirm('Are you sure you want to delete this SMS?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
        @empty
            <tr>
                <td colspan="6" class="text-center">No messages found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
<!-- /Performance Indicator list -->
</div>
</div>
<!-- /Recently Registered -->

<!-- Recent Plan Expired -->
<div class="col-xxl-4 col-xl-4 d-flex">
<div class="card w-100">
<div class="card-body">
<!-- Company Detail -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Send SMS<</h4>
</div>
<hr>
<div class="modal-body pb-0">
<form method="POST" action="{{ route('sms.store') }}">
@csrf
<div class="row">
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">campign Name<strong class="text-danger">*</strong></label>
<input type="text" class="form-control" name="campign" placeholder="Campign Name" value="{{ old('campign') }}">
<span class="text-danger">@error('campign') {{ $message }} @enderror</span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Select Template<strong class="text-danger">*</strong></label>
<select class="form-control" name="sms_template" id="sms_template">
<option value="">Select Template</option>
@foreach ($templates as $template)
<option 
value="{{ $template->id }}" 
data-body="{{ $template->body }}" 
{{ old('sms_template') == $template->id ? 'selected' : '' }}
>
{{ $template->name }}
</option>
@endforeach
</select>
<span class="text-danger">@error('sms_template') {{ $message }} @enderror</span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">To (Number)<strong class="text-danger">*</strong></label>
<input type="text" class="form-control" name="telephone" placeholder="Enter phone number" value="{{ old('telephone') }}">
<span class="text-danger">@error('telephone') {{ $message }} @enderror</span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Send To Group<strong class="text-danger">*</strong></label>
<select class="form-control" name="SmsType">
<option value="Single Number" {{ old('SmsType') == 'Single Number' ? 'selected' : '' }}>Single Number</option>
<option value="Client" {{ old('SmsType') == 'Client' ? 'selected' : '' }}>Client</option>
<option value="employee" {{ old('SmsType') == 'employee' ? 'selected' : '' }}>Employee</option>
</select>
<span class="text-danger">@error('SmsType') {{ $message }} @enderror</span>
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label class="form-label">Message<strong class="text-danger">*</strong></label>
<textarea class="form-control" name="message" rows="3" placeholder="Enter your message" id="messages">{{ old('message') }}</textarea>
<span class="text-danger">@error('message') {{ $message }} @enderror</span>
</div>
</div>
</div>
<div class="d-flex align-items-center justify-content-end">
<a href="{{ route('sms.index') }}" type="button" class="btn btn-outline-light border me-3">Cancel</a>
<button type="submit" class="btn btn-primary">Send</button>
</div>
</form>
</div>
</div>
<!-- /Company Detail -->

</div>
</div>
<!-- /Recent Plan Expired -->

</div>

<!-- /Performance Indicator list -->
</div>
</div>


@endsection