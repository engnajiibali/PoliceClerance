@extends('include.master')
@section('content')
<div class="content">
    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h6 class="fw-medium d-inline-flex align-items-center mb-3 mb-sm-0">
                <a href="employees.html">
                    <i class="ti ti-arrow-left me-2"></i>Employee Details
                </a>
            </h6>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_bank_satutory" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-circle-plus me-2"></i>Bank & Statutory
                </a>
            </div>
            <div class="head-icons ms-2">
                <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-chevrons-up"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
<ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
<li class="nav-item">
<a class="nav-link active" href="http://localhost:8012/archivespf/setting"><i class="ti ti-settings me-2"></i>applicantnel Record</a>
</li>

<li class="nav-item">
<a class="nav-link" href="http://localhost:8012/archivespf/sms/create"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>Application</a>
</li>
<li class="nav-item">
<a class="nav-link" href="http://localhost:8012/archivespf/sms/create"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>Payments</a>
</li>
	<li class="nav-item">
<a class="nav-link" href="custom-css.html"><i class="ti ti-settings-2 me-2"></i>Certificates</a>
</li>
	<li class="nav-item">
<a class="nav-link" href="custom-css.html"><i class="ti ti-settings-2 me-2"></i>Finger Reports</a>
</li>
	<li class="nav-item">
<a class="nav-link" href="custom-css.html"><i class="ti ti-settings-2 me-2"></i>Crimes</a>
</li>

</ul>
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-bg-1" style="position: relative;">
                <!-- Top Blue Background (replaces ::before) -->
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 90px; background-color: #0f3b70; border-radius: 5px;"></div>

                <div class="card-body p-0" style="position: relative; z-index: 1;">
                <span style="width: 8.6rem !important;" class="avatar avatar-xl m-auto d-flex mb-4">
    <img src="{{ $applicant->photo_path 
            ? asset('/'.$applicant->photo_path) 
            : asset('upload/applicantImg/male.jpeg') }}" 
         alt="Img" 
         style="width: 120px; height: 120px; border: 3px solid white; cursor: pointer; object-fit: cover;"
         data-bs-toggle="modal" 
         data-bs-target="#imageModal">
</span>
                    <br>

                    <div class="text-center px-3 pb-3 border-bottom">
                        <div class="mb-3">
                            <h5 class="d-flex align-items-center justify-content-center mb-1">
                              {{ $applicant->first_name . ' ' . $applicant->middle_name 
                            . ' ' . $applicant->last_name . ' ' . $applicant->fourth_name 
                            }}
                                <i class="ti ti-discount-check-filled text-success ms-1"></i>
                            </h5>
                            <span class="badge badge-soft-secondary fw-medium">
                                Member since {{ date('M Y', strtotime($applicant->created_at)) }}
                            </span>
                        </div>

                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-id me-2"></i> S/N
                                </span>
                                <p class="text-dark">{{ $applicant->id ?? 'N/A' }}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-id me-2"></i> SPF-ID
                                </span>
                                <p class="text-dark">{{ $applicant->id ?? 'N/A' }}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-calendar-check me-2"></i> Date Of Birth
                                </span>
                                <p class="text-dark">
                                    {{ $applicant->dob ? date('d M Y', strtotime($applicant->dob)) : 'N/A' }}
                                </p>
                            </div>
                                 <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-calendar-check me-2"></i> Marital Status
                                </span>
                                <p class="text-dark">
                                   {{ $applicant->marital_status ?? 'N/A' }}
                                </p>
                            </div>
                            <!-- <div class="row gx-2 mt-3">
                                <div class="col-6">
                                    <a href="#" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#edit_applicant">
                                        <i class="ti ti-edit me-1"></i>Edit Info
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-primary w-100">
                                        <i class="ti ti-message-heart me-1"></i>Message
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="p-3 border-bottom">
                        <div class="d-flex align-items-center  text-white justify-content-between mb-2">
                            <h6>Basic information</h6>
                            <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_employee">
                                <i class="ti ti-edit"></i>
                            </a>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-phone me-2"></i> Phone
                            </span>
                            <p class="text-dark">{{ $applicant->phone ?? '***' }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-mail-check me-2"></i> Email
                            </span>
                            <a href="javascript:void(0);" class="text-info d-inline-flex align-items-center">
                                {{ $applicant->email ?? 'N/A' }}
                            </a>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-gender-male me-2"></i> Gender
                            </span>
                            <p class="text-dark text-end">{{ $applicant->gender ?? 'N/A' }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-map-pin-check me-2"></i> Address
                            </span>
                            <p class="text-dark text-end">{{ $applicant->address ?? 'Address not available' }}</p>
                        </div>
                    </div>
                     <!-- <div class="p-3 border-bottom">
                        <div class="d-flex align-items-center  text-white justify-content-between mb-2">
                            <h6>Physical Characteristics</h6>
                            <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_employee">
                                <i class="ti ti-edit"></i>
                            </a>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-phone me-2"></i> Complexion
                            </span>
                            <p class="text-dark">{{ $applicant->color ?? '***' }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-mail-check me-2"></i> Eye Color
                            </span>
                            <a href="javascript:void(0);" class="text-info d-inline-flex align-items-center">
                              
                            </a>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-gender-male me-2"></i> Blood Type
                            </span>
                            <p class="text-dark text-end">{{ $applicant->blood ?? 'N/A' }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <span class="d-inline-flex align-items-center">
                                <i class="ti ti-map-pin-check me-2"></i> height
                            </span>
                            <p class="text-dark text-end">{{ $applicant->height ?? 'N/A' }}</p>
                        </div>
                    </div> -->
                </div>
            </div>

          
        </div>
        <div class="col-xl-8">
<div class="card m-0">
            <div class="card-header bg-primary text-white">
                <h5 style="color:white;" class="mb-0">applicantal Information</h5>
            </div>
<div class="card-body">
    {{-- LEFT HAND FINGERPRINTS --}}
    <h6 class="mt-3">Left Hand</h6>
    <div class="row text-center">
        @if($LeftHand->count() > 0)
            @foreach($LeftHand as $finger)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                    {{-- Finger Name --}}
                    <small class="d-block mb-2">{{ strtoupper(str_replace('_', ' ', $finger->finger_name)) }}</small>

                    {{-- Fingerprint Image --}}
                    @if($finger->finger_img && file_exists(public_path($finger->finger_img)))
                        <img src="{{ asset($finger->finger_img) }}" 
                             class="img-fluid rounded border shadow-sm" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                        <p class="text-muted small">No image</p>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-muted">No Left Hand fingerprints registered for this person.</p>
        @endif
    </div>

    {{-- RIGHT HAND FINGERPRINTS --}}
    <h6 class="mt-4">Right Hand</h6>
    <div class="row text-center">
        @if($RightHand->count() > 0)
            @foreach($RightHand as $finger)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                    {{-- Finger Name --}}
                    <small class="d-block mb-2">{{ strtoupper(str_replace('_', ' ', $finger->finger_name)) }}</small>

                    {{-- Fingerprint Image --}}
                    @if($finger->finger_img && file_exists(public_path($finger->finger_img)))
                        <img src="{{ asset($finger->finger_img) }}" 
                             class="img-fluid rounded border shadow-sm" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                        <p class="text-muted small">No image</p>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-muted">No Right Hand fingerprints registered for this person.</p>
        @endif
    </div>
</div>

        </div>

        <!-- <div class="card m-0">
            <div class="card-header bg-primary text-white">
                <h5 style="color:white;" class="mb-0">Physical Characteristics</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Complexion:</strong> Bunni</p>
                        <p><strong>Eye Color:</strong> Dugul</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Blood Type:</strong> O+</p>
                        <p><strong>Height:</strong> 170 cm</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Clothing Size:</strong> XL</p>
                        <p><strong>Shoes Size:</strong> 41</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="card m-0">
            <div class="card-header bg-primary text-white">
                <h5 style="color:white;" class="mb-0">Administrative Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Status:</strong> 
                            <span class="badge badge-success">
                                Active
                            </span>
                        </p>
                        <p><strong>Added By:</strong> 8</p>
                        <p><strong>Date Added:</strong> 2025-05-04 03:21:46.048889-04</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Last Updated By:</strong> 1</p>
                        <p><strong>Last Update Date:</strong> 2025-05-09 01:45:51.328882-04</p>
                        <p><strong>Picture Size:</strong> 30247</p>
                    </div>
                </div>
            </div>
        </div> -->
</div>
        <!-- Additional content for other columns would go here -->
    </div>
</div>

<!-- Edit Member Modal -->
<div class="modal fade" id="edit_applicant" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">Edit applicant Info</h4>
                    <span>applicant ID: #{{ $applicant->id_no }}</span>
                </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <form id="pForm" method="post" action="{{ route('applicants.update', $applicant->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row p-3">
                    <!-- Profile Image & Upload -->
                    <div class="col-md-12 mb-4">
                        <div class="d-flex align-items-center flex-wrap bg-light rounded p-3">
                            <div class="avatar avatar-xxl rounded-circle border border-dashed me-3 flex-shrink-0 d-flex justify-content-center align-items-center">
                                <img src="{{ $applicant->picture 
                                        ? asset('https://spf-hr.com/media/'.$applicant->picture) 
                                        : asset('upload/applicantImg/male.jpeg') }}" 
                                    alt="Profile Image" 
                                    class="rounded-circle" 
                                    style="max-width: 120px; max-height: 120px;"
                                    id="profileImagePreview">
                            </div>

                            <div class="profile-upload">
                                <h6 class="mb-1">Change Profile Image</h6>
                                <p class="fs-12 mb-2">Image should be below 4MB</p>

                                <div class="d-flex align-items-center">
                                    <label class="btn btn-sm btn-primary me-2 mb-0" for="applicantImgInput" style="cursor:pointer;">
                                        Upload
                                        <input type="file" id="applicantImgInput" name="applicantImg" class="form-control d-none" accept="image/*">
                                    </label>
                                    <button type="button" class="btn btn-light btn-sm" id="cancelUpload">Cancel</button>
                                </div>

                                <span class="text-danger">@error('applicantImg') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <!-- Full Name -->
                    <div class="col-sm-6 mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Full Name" value="{{ old('fullName', $applicant->FullName) }}">
                        <span class="text-danger">@error('fullName') {{ $message }} @enderror</span>
                    </div>

                    <!-- Gender -->
                    <div class="col-sm-6 mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" {{ old('gender', $applicant->Gender) == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" {{ old('gender', $applicant->Gender) == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                        <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                    </div>

                    <!-- Email -->
                    <div class="col-sm-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="email@example.com" value="{{ old('email', $applicant->Email) }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>

                    <!-- Phone -->
                    <div class="col-sm-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input class="form-control" type="text" id="phone" name="phone" placeholder="+252 xxxxxxxxx" value="{{ old('phone', $applicant->Phone) }}">
                        <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                    </div>
                </div>

                <hr>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light border me-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img src="{{ $applicant->photo_path 
                        ? asset('/'.$applicant->photo_path) 
                        : asset('upload/applicantImg/male.jpeg') }}" 
                    class="img-fluid w-100" 
                    alt="applicant Image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var importModal = new bootstrap.Modal(document.getElementById('edit_applicant'));
        importModal.show();
    });
</script>
@endif

<script>
    // Preview image before upload
    document.getElementById('applicantImgInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Cancel upload button
    document.getElementById('cancelUpload').addEventListener('click', function() {
        document.getElementById('applicantImgInput').value = '';
        document.getElementById('profileImagePreview').src = "{{ $applicant->picture 
                ? asset('https://spf-hr.com/media/'.$applicant->picture) 
                : asset('upload/applicantImg/male.jpeg') }}";
    });
</script>
@endsection