@extends('include.master')
@section('content')
<div class="content">
	<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
		<div class="my-auto mb-2">
			<h2 class="mb-1">{{$pageTitle}}</h2>
		</div>
	</div>

	<div>
		@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> {{Session::get('success')}}</h4>
		</div>
		@endif
	</div>
	<br>

	<div class="row">
		<div class="col-xxl-8 col-xl-8 d-flex">
			<div class="card w-100">
				<div class="card-header"><h5>{{$pageTitle}}</h5></div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>District Name</th>
									<th>Region</th>
									<th>Created At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@forelse ($districts as $district)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $district->name }}</td>
									<td>{{ $district->region->name ?? 'N/A' }}</td>
									<td>{{ $district->created_at->diffForHumans() }}</td>
									<td>
										<a href="{{ route('districts.edit', $district->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
										<form action="{{ route('districts.destroy', $district->id) }}" method="POST" style="display:inline-block;" 
											onsubmit="return confirm('Are you sure you want to delete this district?');">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
										</form>
									</td>
								</tr>
								<?php $i++; ?>
								@empty
								<tr><td colspan="6" class="text-center">No districts found.</td></tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xxl-4 col-xl-4 d-flex">
			<div class="card w-100">
				<div class="card-body">
					<div class="modal-content">
						<div class="modal-header"><h4 class="modal-title">Add District</h4></div>
						<hr>
						<div class="modal-body pb-0">
							<form method="POST" action="{{ route('districts.store') }}">
								@csrf
								<div class="mb-3">
									<label class="form-label">Region <strong class="text-danger">*</strong></label>
									<select class="form-control" name="region_id">
										<option value="">Select Region</option>
										@foreach($regions as $region)
										<option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
										@endforeach
									</select>
									<span class="text-danger">@error('region_id') {{ $message }} @enderror</span>
								</div>
								<div class="mb-3">
									<label class="form-label">District Name <strong class="text-danger">*</strong></label>
									<input type="text" class="form-control" name="name" placeholder="District Name" value="{{ old('name') }}">
									<span class="text-danger">@error('name') {{ $message }} @enderror</span>
								</div>
								<div class="d-flex align-items-center justify-content-end">
									<a href="{{ route('districts.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
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
