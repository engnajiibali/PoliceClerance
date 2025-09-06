@extends('include.master')
@section('content')
<div class="content">

    {{-- Flash Messages --}}
    <div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><i class="icon fa fa-times"></i> {{ Session::get('fail') }}</h4>
            </div>
        @endif
    </div>

    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">
                KIISKA DAMBIGA <br>
                <small class="text-muted">
                    CASE #{{ $crimecase->case_number }} / {{ \Carbon\Carbon::parse($crimecase->date_time)->format('Y') }}
                </small>
            </h6>
            <div class="d-flex gap-2">
                <a href="{{ route('crimes-cases.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-big-left me-2"></i> Back
                </a>
                <a href="{{ route('crimes-cases.create') }}" class="btn btn-primary">
                    <i class="ti ti-circle-plus me-2"></i> Case New
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Sidebar --}}
        <div class="col-lg-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item py-3 {{ request()->routeIs('crimes-cases.show') ? 'active bg-primary text-white' : '' }}">
                            <a href="{{ route('crimes-cases.show', $crimecase->id) }}" class="d-flex align-items-center {{ request()->routeIs('crimes-cases.show') ? 'text-white' : 'text-dark' }}">
                                <i class="flaticon-file-2 me-2"></i> <span>Faahfaahin</span>
                            </a>
                        </li>

                        <li class="list-group-item py-3 {{ request()->routeIs('crimes-cases.suspects') ? 'active bg-primary text-white' : '' }}">
                            <a href="{{ route('crimes-cases.suspects', $crimecase->id) }}" class="d-flex align-items-center {{ request()->routeIs('crimes-cases.suspects') ? 'text-white' : 'text-dark' }}">
                                <i class="flaticon-users me-2"></i> <span>Eedeysanayaal</span>
                            </a>
                        </li>

                        <li class="list-group-item py-3 {{ request()->routeIs('crimes-cases.victims') ? 'active bg-primary text-white' : '' }}">
                            <a href="{{ route('crimes-cases.victims', $crimecase->id) }}" class="d-flex align-items-center {{ request()->routeIs('crimes-cases.victims') ? 'text-white' : 'text-dark' }}">
                                <i class="flaticon-users me-2"></i> <span>Dhibanayaal</span>
                            </a>
                        </li>

                        <li class="list-group-item py-3 {{ request()->routeIs('crimes-cases.witnesses') ? 'active bg-primary text-white' : '' }}">
                            <a href="{{ route('crimes-cases.witnesses', $crimecase->id) }}" class="d-flex align-items-center {{ request()->routeIs('crimes-cases.witnesses') ? 'text-white' : 'text-dark' }}">
                                <i class="flaticon-eye me-2"></i> <span>Goobjoogayaal</span>
                            </a>
                        </li>

                        <li class="list-group-item py-3 {{ request()->routeIs('crimes-cases.evidence') ? 'active bg-primary text-white' : '' }}">
                            <a href="{{ route('crimes-cases.evidence', $crimecase->id) }}" class="d-flex align-items-center {{ request()->routeIs('crimes-cases.evidence') ? 'text-white' : 'text-dark' }}">
                                <i class="flaticon2-file-1 me-2"></i> <span>Caddeymo</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
                <div class="card shadow-sm border-0">
                <div class="card-body p-0">
               <div id="finger-loading" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    z-index:9999;
    align-items:center;
    justify-content:center;
">
    <div style="text-align:center; color:white;">
        <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Scanning Fingerprint...</p>
    </div>
</div>

                <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 style="color:white;">Scan and Verify Fingerprint</h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img id="FPImage1" 
                             src="{{ asset('upload/PlaceFinger.bmp') }}" 
                             alt="Fingerprint Image" 
                             class="img-thumbnail"
                             style="max-height:200px;">
                    </div>
                    <div class="form-group">
                        <label for="quality">Matching Quality Threshold</label>
                        <input type="hidden" id="quality" name="quality" class="form-control text-center" value="60">
                    </div>
                    <div id="errmsg" class="text-danger font-weight-bold my-2"></div>
                    <button type="button" class="btn btn-success mt-2" onclick="CallSGIFPGetData()">
                        <i class="fa fa-fingerprint"></i> Scan Finger
                    </button>
                    <button type="button" class="btn btn-primary mt-2" onclick="matchScore()">
                        <i class="fa fa-search"></i> Verify Finger
                    </button>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="col-lg-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Progress Bar --}}
                    <div class="bg-light shadow-sm border border-primary border-dashed rounded p-3 mb-3">
                        <div class="progress mb-2" style="height: 16px;">
                            <div class="progress-bar bg-primary" style="width: 25%;">25%</div>
                        </div>
                        <div class="d-flex justify-content-between small">
                            <div class="text-primary fw-bold"><i class="far fa-play-circle me-1"></i> Baaris</div>
                            <div class="text-muted"><i class="far fa-circle me-1"></i> Gungaar</div>
                            <div class="text-muted"><i class="far fa-circle me-1"></i> Garsuge</div>
                            <div class="text-muted"><i class="far fa-circle me-1"></i> Xukun</div>
                        </div>
                    </div>

                    {{-- Section Content --}}
                    @yield('case-content')

                </div>
            </div>
        </div>
    </div>
</div>
<div id="finger-loading" style="display:none; justify-content:center; align-items:center;">
    <p>Scanning Fingerprint...</p>
</div>
<!-- Bootstrap Modal -->
<div class="modal fade" id="applicantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Person Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="applicantDetails">
        <p>Loading...</p>
      </div>
    </div>
  </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
let template_1 = "";
let scannedUrl = "";

// --- Loader Functions ---
function showFingerLoader() {
    document.getElementById("finger-loading").style.display = "flex";
}
function hideFingerLoader() {
    document.getElementById("finger-loading").style.display = "none";
}

// --- Fingerprint Capture Success ---
function SuccessFunc1(result) {
    hideFingerLoader();
    if (result.ErrorCode === 0) {
        if (result.BMPBase64 && result.BMPBase64.length > 0) {
            document.getElementById('FPImage1').src = "data:image/bmp;base64," + result.BMPBase64;
        }
        template_1 = result.TemplateBase64;
    } else {
        alert("Fingerprint Capture Error Code: " + result.ErrorCode + "\nDescription: " + (ErrorCodeToString ? ErrorCodeToString(result.ErrorCode) : ""));
    }
}

// --- Fingerprint Capture Error ---
function ErrorFunc(status) {
    hideFingerLoader();
    alert("Check if SGIBIOSRV is running; status = " + status);
}

// --- Capture Fingerprint ---
async function CallSGIFPGetData() {
    showFingerLoader();
    $("#errmsg").text("");

    try {
        const params = new URLSearchParams({
            Timeout: "10000",
            Quality: "50",
            templateFormat: "ISO"
        });

        const response = await fetch("https://localhost:8443/SGIFPCapture", {
            method: "POST",
            body: params,
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        });

        if (!response.ok) throw new Error("Fingerprint service not found");

        const result = await response.json();
        SuccessFunc1(result);
    } catch (error) {
        ErrorFunc(error.message);
    }
}

// --- Match Fingerprint ---
async function matchScore() {
    if (!template_1) {
        $("#errmsg").text("Please scan the Thumb to verify!");
        return;
    }

    showFingerLoader();
    $("#errmsg").text("");

    try {
        const idQuality = parseInt(document.getElementById("quality").value);

        // Fetch all stored fingerprints from server
        const res = await $.ajax({
            url: "{{ url('getFingerprints') }}",
            type: "GET",
            data: { _token: '{{ csrf_token() }}' },
            dataType: 'json'
        });

        let matchFound = false;

        for (const person of res) {
            const params = new URLSearchParams({
                template1: template_1,
                template2: person.fingers_temp,
                templateFormat: "ISO"
            });

            const matchResponse = await fetch("https://localhost:8443/SGIMatchScore", {
                method: "POST",
                body: params,
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            });

            if (!matchResponse.ok) continue;

            const matchResult = await matchResponse.json();
if (matchResult.MatchingScore >= idQuality) {
    scannedUrl = "{{ route('getdata.show', ':id') }}".replace(':id', person.person_id);

    $.ajax({
        url: scannedUrl,
        type: "GET",
        dataType: "json",
        success: function (data) {
            let p = data.person;
let imageUrl = data.person.image 
    ? `{{ asset('upload/personImg/') }}/${data.person.image}` 
    : `{{ asset('images/default-avatar.png') }}`;
            // LEFT: Photo | RIGHT: Information
            let html = `
                <div class="row mb-3">
                           <div class="col-md-4 text-center">
                <img src="${imageUrl}" 
                     alt="Profile Image" 
                     class="img-thumbnail rounded" 
                     style="width: 100%; max-width: 220px; height: auto; object-fit: cover;">
                <h5 class="mt-2">${p.FullName}</h5>
                <span class="badge bg-primary">${p.status ?? 'Unknown'}</span>
            </div>
                    <div class="col-md-8">
                         <table class="table table-bordered">
                    <tr>
                        <th>Mother's Name</th>
                        <td>${p.Mothername ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>${p.Gender ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>${p.DOB ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Place of Birth</th>
                        <td>${p.POB ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>${p.Naitonality ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>${p.address ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>${p.Phone ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>${p.Email ?? '-'}</td>
                    </tr>
                </table>
                    </div>
                 
                </div>
            `;
const basePath = "{{ asset('../../../') }}/";
            // BOTTOM: Fingerprint Images
            if (data.fingers && data.fingers.length > 0) {
                html += `<div class="row"><h6>Fingerprints</h6>`;

            data.fingers.forEach(finger => {
    html += `
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">
            <small class="d-block mb-2">${finger.finger_name.replaceAll('_',' ').toUpperCase()}</small>
            ${finger.finger_img 
                ? `<img src="{{ asset('') }}${finger.finger_img}" 
                        class="img-fluid rounded border shadow-sm" 
                        style="width:80px; height:80px; object-fit:cover;">`
                : `<p class="text-muted small">No image</p>`}
        </div>
    `;
});
                html += `</div>`;
            }

            // Insert into modal
            $("#applicantDetails").html(html);

            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('applicantModal'));
            modal.show();
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Unable to load person details.'
            });
        }
    });

    matchFound = true;
    break;
}



          
        }

        if (!matchFound) {
            Swal.fire({
                icon: 'error',
                title: 'Fingerprint Not Found',
                text: 'The scanned fingerprint does not match any record.',
                confirmButtonText: 'Try Again'
            });
        }

    } catch (error) {
        console.error(error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while matching the fingerprint.'
        });
    } finally {
        hideFingerLoader();
    }
}
</script>
@endsection
