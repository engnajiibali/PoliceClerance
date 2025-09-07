@extends('include.master')
@section('content')
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Locations</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Locations</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                </ol>
            </nav>
        </div>
        <div class="head-icons ms-2">
            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
               data-bs-original-title="Collapse" id="collapse-header">
                <i class="ti ti-chevrons-up"></i>
            </a>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Flash Messages -->
    <div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="icon fa fa-check"></i> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="icon fa fa-times"></i> {{ Session::get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <br>

    <!-- Tabs -->
    <ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('districts.index') }}">
                <i class="ti ti-settings me-2"></i>Districts
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('regions.index') }}">
                <i class="ti ti-device-ipad-horizontal-cog me-2"></i>Regions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('States.index') }}">
                <i class="ti ti-settings-2 me-2"></i>States
            </a>
        </li>
    </ul>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- State List -->
                        <div class="col-xxl-8 col-xl-8 d-flex">
                            <div class="card w-100">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h5>{{ $pageTitle }}</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="custom-datatable-filter table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>State Name</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @forelse ($states as $state)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $state->name }}</td>
                                                        <td>{{ $state->lat }}</td>
                                                        <td>{{ $state->lng }}</td>
                                                        <td>{{ $state->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <a href="{{ route('States.edit', $state->id) }}" class="btn btn-warning btn-sm">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                            <form action="{{ route('States.destroy', $state->id) }}" method="POST"
                                                                  style="display:inline-block;"
                                                                  onsubmit="return confirm('Are you sure you want to delete this state?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No states found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add State Form -->
                        <div class="col-xxl-4 col-xl-4 d-flex">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add State</h4>
                                        </div>
                                        <hr>
                                        <div class="modal-body pb-0">
                                            <form method="POST" action="{{ route('States.store') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">State Name <strong class="text-danger">*</strong></label>
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="State Name" value="{{ old('name') }}">
                                                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Latitude <strong class="text-danger">*</strong></label>
                                                        <input type="text" class="form-control" name="lat"
                                                               placeholder="Latitude" value="{{ old('lat') }}">
                                                        <span class="text-danger">@error('lat') {{ $message }} @enderror</span>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Longitude <strong class="text-danger">*</strong></label>
                                                        <input type="text" class="form-control" name="lng"
                                                               placeholder="Longitude" value="{{ old('lng') }}">
                                                        <span class="text-danger">@error('lng') {{ $message }} @enderror</span>
                                                    </div>

                                                    <!-- Button to open map modal -->
                                                    <div class="col-md-12 mb-3">
                                                        <button type="button" class="btn btn-info w-100"
                                                                data-bs-toggle="modal" data-bs-target="#mapModal">
                                                            <i class="fa fa-map"></i> Pick Location on Map
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <a href="{{ route('States.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Add State Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pick Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="map" style="height: 500px;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([2.0469, 45.3182], 6); // Center Somalia

        // Tile Layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker;

        // When clicking on map
        map.on('click', function (e) {
            var lat = e.latlng.lat.toFixed(6);
            var lng = e.latlng.lng.toFixed(6);

            // Place or move marker
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            // Set values to input fields
            document.querySelector("input[name='lat']").value = lat;
            document.querySelector("input[name='lng']").value = lng;
        });

        // Fix map not showing when modal first opens
        var mapModal = document.getElementById('mapModal');
        mapModal.addEventListener('shown.bs.modal', function () {
            setTimeout(() => {
                map.invalidateSize();
            }, 200);
        });
    });
</script>
@endsection
