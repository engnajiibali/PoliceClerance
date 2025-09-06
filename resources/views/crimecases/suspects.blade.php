@extends('crimecases.layout')

@section('case-content')
<div class="card border shadow-sm">
    <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
        <span><i class="ti ti-users me-2"></i> Suspects for Case #{{ $crimecase->case_number }}</span>
    </div>

    <div class="card-body">

        {{-- Add Suspect Form --}}
        <form action="{{ route('crimes-cases.suspects.store', $crimecase->id) }}" method="POST" class="row mb-4">
            @csrf

            <!-- Person + Status Group -->
            <div class="col-md-9 d-flex gap-2">
                <!-- Person Select -->
              <div class="flex-fill d-flex align-items-end gap-2">
    <div class="flex-grow-1">
        <label for="person_id" class="form-label">Select Person</label>
        <select name="person_id" id="person_id" class="form-select select2" required>
            <option value="">-- Choose Person --</option>
            @foreach($persons as $person)
                <option value="{{ $person->id }}">{{ $person->FullName }}</option>
            @endforeach
        </select>
    </div>

    <!-- Add New Person Button -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#add_person" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#add_person">
        <i class="ti ti-plus"></i>
    </button>
</div>


                <!-- Status Dropdown -->
                <div style="width: 180px;">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">-- Status --</option>
                        <option value="arrested">Arrested</option>
                        <option value="wanted">Wanted</option>
                        <option value="released">Released</option>
                        <option value="convicted">Convicted</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">
                    <i class="ti ti-plus me-1"></i> Add Suspect
                </button>
            </div>
        </form>

     

        {{-- Suspects Table --}}
        @if($crimecase->suspects->count())
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Person ID</th>
                            <th>Full Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($crimecase->suspects as $key => $suspect)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $suspect->persons->id ?? 'Unknown' }}</td>
                                <td>{{ $suspect->persons->FullName ?? 'Unknown' }}</td>
                                <td>
											<div class="action-icon d-inline-flex">
												<a href="#" class="me-2  view-suspect"  data-id="{{ $suspect->id }}" 
                    data-bs-toggle="modal" 
                    data-bs-target="#viewSuspectModal"><i class="ti ti-eye"></i></a>
												<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_company"><i class="ti ti-edit"></i></a>
												<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
											</div>
										</td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted mb-0">No suspects found.</p>
        @endif

    </div>
</div>

{{-- Add Company Modal --}}
<!-- Add Person Modal -->
<div class="modal fade" id="add_person" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Person</h4>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
        <form action="{{ route('suspect.store123') }}" method="POST" enctype="multipart/form-data">
    @csrf
                <div class="modal-body pb-0">
                    <div class="row">
                        <!-- Profile Image Upload -->
                        <div class="col-md-12">
                            <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
                                <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                    <img src="assets/img/profiles/avatar-30.jpg" alt="img" class="rounded-circle">
                               <input type="hidden" name="crimecase_id" value="{{ $crimecase->id }}">

                                  </div>                                              
                                <div class="profile-upload">
                                    <div class="mb-2">
                                        <h6 class="mb-1">Upload Profile Image</h6>
                                        <p class="fs-12">Image should be below 4 MB</p>
                                    </div>
                                    <div class="profile-uploader d-flex align-items-center">
                                        <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                            Upload
                                            <input type="file" name="profile_image" class="form-control image-sign" accept="image/*">
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Person Info Fields -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="FullName" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" name="Mothername" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select name="Gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Place of Birth</label>
                                <input type="text" name="POB" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="DOB" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nationality</label>
                                <input type="text" name="Naitonality" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="Address" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="PhoneNumber" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="Email" class="form-control">
                            </div>
                        </div>

                        <!-- Optional: Status / Notes -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="Status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="arrested">Arrested</option>
                                    <option value="wanted">Wanted</option>
                                    <option value="released">Released</option>
                                    <option value="convicted">Convicted</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea name="Notes" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Person</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Person Modal -->


<!-- View Suspect Modal -->
<div class="modal fade" id="viewSuspectModal" tabindex="-1" aria-labelledby="viewSuspectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSuspectModalLabel">Suspect Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="suspect-details">
                <!-- Data will be loaded here -->
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('.view-suspect').click(function() {
          
        let suspectId = $(this).data('id');
        let url = "{{ route('suspects.View', ':id') }}".replace(':id', suspectId);

        $('#suspect-details').html('<p class="text-muted">Loading...</p>');

      $.get(url, function(data) {
let imageUrl = data.image 
    ? `{{ asset('upload/personImg/') }}/${data.image}` 
    : `{{ asset('images/default-avatar.png') }}`;

      let html = `
        <div class="row">
            <!-- Left side: Image -->
            <div class="col-md-4 text-center">
                <img src="${imageUrl}" 
                     alt="Profile Image" 
                     class="img-thumbnail rounded" 
                     style="width: 100%; max-width: 220px; height: auto; object-fit: cover;">
                <h5 class="mt-2">${data.FullName}</h5>
                <span class="badge bg-primary">${data.status ?? 'Unknown'}</span>
            </div>

            <!-- Right side: Information -->
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Mother's Name</th>
                        <td>${data.Mothername ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>${data.Gender ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>${data.DOB ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Place of Birth</th>
                        <td>${data.POB ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>${data.Naitonality ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>${data.address ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>${data.Phone ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>${data.Email ?? '-'}</td>
                    </tr>
                </table>
            </div>
        </div>
    `;

    $('#suspect-details').html(html);
});

    });
});
</script>
@endpush