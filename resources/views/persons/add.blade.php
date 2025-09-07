@extends('include.master')

@section('content')
<div class="content">

    <!-- Page Header -->
    <div class="page-header mb-3">
        <h3>Add Person</h3>
    </div>

    <!-- Flash Messages -->
    <div>
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>
        </div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4><i class="icon fa fa-times"></i> {{ Session::get('fail') }}</h4>
        </div>
        @endif
    </div>

    <form method="POST" action="{{ route('persons.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <!-- Profile Image Upload -->
            <div class="col-md-12 mb-3">
                <label>Profile Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" onchange="previewFile(this);">
                <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                <img id="filePreview" src="#" alt="Preview" style="display:none; margin-top:10px; width:150px; height:150px; object-fit:cover; border-radius:50%;">
            </div>

            <!-- Webcam Capture -->
            <div class="col-md-12 mb-3">
                <label>Take Photo</label>
                <div class="d-flex flex-column align-items-start">
                    <img id="photoPreview" src="#" alt="Photo Preview" style="width:150px; height:150px; object-fit:cover; border-radius:50%; display:none; border:1px solid #ccc; margin-bottom:10px;">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cameraModal">
                        Take Photo
                    </button>
                    <input type="hidden" name="captured_image" id="captured_image">
                </div>
                <span class="text-danger">@error('captured_image') {{ $message }} @enderror</span>
            </div>

            <!-- Full Name -->
            <div class="col-md-6 mb-3">
                <label>Full Name <strong class="text-danger">*</strong></label>
                <input type="text" name="FullName" class="form-control" value="{{ old('FullName') }}">
                <span class="text-danger">@error('FullName') {{ $message }} @enderror</span>
            </div>

            <!-- Gender -->
            <div class="col-md-6 mb-3">
                <label>Gender <strong class="text-danger">*</strong></label>
                <div>
                    <label class="me-3">
                        <input type="radio" name="Gender" value="Male" {{ old('Gender') == 'Male' ? 'checked' : '' }}> Male
                    </label>
                    <label>
                        <input type="radio" name="Gender" value="Female" {{ old('Gender') == 'Female' ? 'checked' : '' }}> Female
                    </label>
                </div>
                <span class="text-danger">@error('Gender') {{ $message }} @enderror</span>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" value="{{ old('Email') }}">
                <span class="text-danger">@error('Email') {{ $message }} @enderror</span>
            </div>

            <!-- Phone -->
            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="Phone" class="form-control" value="{{ old('Phone') }}">
                <span class="text-danger">@error('Phone') {{ $message }} @enderror</span>
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                <span class="text-danger">@error('status') {{ $message }} @enderror</span>
            </div>

            <!-- Created By -->
            <div class="col-md-6 mb-3">
                <label>Created By</label>
                <input type="text" name="createdby" class="form-control" value="{{ old('createdby') }}">
                <span class="text-danger">@error('createdby') {{ $message }} @enderror</span>
            </div>

            <!-- Mother Name -->
            <div class="col-md-6 mb-3">
                <label>Mother Name</label>
                <input type="text" name="Mothername" class="form-control" value="{{ old('Mothername') }}">
                <span class="text-danger">@error('Mothername') {{ $message }} @enderror</span>
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label>Date of Birth</label>
                <input type="date" name="DOB" class="form-control" value="{{ old('DOB') }}">
                <span class="text-danger">@error('DOB') {{ $message }} @enderror</span>
            </div>

            <!-- Place of Birth -->
            <div class="col-md-6 mb-3">
                <label>Place of Birth</label>
                <input type="text" name="POB" class="form-control" value="{{ old('POB') }}">
                <span class="text-danger">@error('POB') {{ $message }} @enderror</span>
            </div>

            <!-- Nationality -->
            <div class="col-md-6 mb-3">
                <label>Nationality</label>
                <input type="text" name="Naitonality" class="form-control" value="{{ old('Naitonality') }}">
                <span class="text-danger">@error('Naitonality') {{ $message }} @enderror</span>
            </div>

            <!-- Address -->
            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
            </div>

            <!-- Notes -->
            <div class="col-md-12 mb-3">
                <label>Notes</label>
                <textarea name="Notes" class="form-control" rows="3">{{ old('Notes') }}</textarea>
                <span class="text-danger">@error('Notes') {{ $message }} @enderror</span>
            </div>

        </div>

        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('persons.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<!-- Camera Modal -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Capture Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalBtn"></button>
            </div>
            <div class="modal-body text-center">
                <video id="video" width="320" height="240" autoplay style="border:1px solid #ccc;"></video>
                <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" id="snap" class="btn btn-success">Capture</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelCamera">Cancel</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // File preview
    function previewFile(input) {
        const preview = document.getElementById('filePreview');
        const file = input.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    // Webcam Modal
    let video = document.getElementById('video');
    let canvas = document.getElementById('canvas');
    let snapBtn = document.getElementById('snap');
    let capturedInput = document.getElementById('captured_image');
    let photoPreview = document.getElementById('photoPreview');
    let stream;

    const cameraModal = document.getElementById('cameraModal');
    cameraModal.addEventListener('shown.bs.modal', () => {
        navigator.mediaDevices.getUserMedia({ video: true }).then(s => {
            stream = s;
            video.srcObject = stream;
            video.play();
        });
    });

    cameraModal.addEventListener('hidden.bs.modal', () => {
        if(stream){
            stream.getTracks().forEach(track => track.stop());
        }
    });

    snapBtn.addEventListener('click', () => {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataURL = canvas.toDataURL('image/png');
        capturedInput.value = dataURL;
        photoPreview.src = dataURL;
        photoPreview.style.display = 'block';
        const modalInstance = bootstrap.Modal.getInstance(cameraModal);
        modalInstance.hide();
        if(stream){
            stream.getTracks().forEach(track => track.stop());
        }
    });
</script>
@endpush

@endsection
