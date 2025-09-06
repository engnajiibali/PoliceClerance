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
        <!-- Addresses Table -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header"><h5>{{$pageTitle}}</h5></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Applicant</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($addresses as $address)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $address->applicant->first_name ?? 'N/A' }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->type }}</td>
                                    <td>{{ $address->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('applicant_addresses.edit', $address->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('applicant_addresses.destroy', $address->id) }}" method="POST" style="display:inline-block;" 
                                            onsubmit="return confirm('Are you sure you want to delete this address?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr><td colspan="6" class="text-center">No addresses found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Address Form -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title">Add Address</h4></div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="{{ route('applicant_addresses.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Applicant <strong class="text-danger">*</strong></label>
                                    <select class="form-control" name="applicant_id">
                                        <option value="">Select Applicant</option>
                                        @foreach($applicants as $applicant)
                                        <option value="{{ $applicant->id }}" {{ old('applicant_id') == $applicant->id ? 'selected' : '' }}>
                                            {{ $applicant->first_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('applicant_id') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address <strong class="text-danger">*</strong></label>
                                    <textarea class="form-control" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                    <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" name="type" placeholder="Type (e.g., Home, Office)" value="{{ old('type') }}">
                                    <span class="text-danger">@error('type') {{ $message }} @enderror</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('applicant_addresses.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
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
