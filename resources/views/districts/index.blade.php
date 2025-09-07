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
            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
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
            <a class="nav-link active" href="{{ route('districts.index') }}">
                <i class="ti ti-settings me-2"></i>Districts
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('regions.index') }}">
                <i class="ti ti-device-ipad-horizontal-cog me-2"></i>Regions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('States.index') }}">
                <i class="ti ti-settings-2 me-2"></i>States
            </a>
        </li>
    </ul>
    <div class="row">
        <!-- District List -->
        <div class="col-xxl-8 col-xl-8 d-flex">
            <div class="card w-100">
                <div class="card-header"><h5>{{ $pageTitle }}</h5></div>
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
                                @php $i = 1; @endphp
                                @forelse ($districts as $district)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $district->name }}</td>
                                    <td>{{ $district->region->name ?? 'N/A' }}</td>
                                    <td>{{ $district->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                        <form action="{{ route('districts.destroy', $district->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">No districts found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add District Form -->
        <div class="col-xxl-4 col-xl-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add District</h4>
                        </div>
                        <hr>
                        <div class="modal-body pb-0">
                            <form method="POST" action="{{ route('districts.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Region <strong class="text-danger">*</strong></label>
                                    <select class="form-control select2" name="region_id">
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

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Latitude <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" readonly>
                                        <span class="text-danger">@error('lat') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Longitude <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" name="lng" id="lng" placeholder="Longitude" readonly>
                                        <span class="text-danger">@error('lng') {{ $message }} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#mapModal">Pick Location on Map</button>
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
        <!-- /Add District Form -->

    </div>
</div>

<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalMap" style="height:500px; width:100%;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS for Map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('modalMap').setView([2.0469, 45.3182], 6); // Somalia
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([2.0469, 45.3182], {draggable:true}).addTo(map);

    // Drag marker
    marker.on('dragend', function(e) {
        var latlng = e.target.getLatLng();
        document.getElementById('lat').value = latlng.lat.toFixed(6);
        document.getElementById('lng').value = latlng.lng.toFixed(6);
    });

    // Click on map
    map.on('click', function(e) {
        var latlng = e.latlng;
        marker.setLatLng(latlng);
        document.getElementById('lat').value = latlng.lat.toFixed(6);
        document.getElementById('lng').value = latlng.lng.toFixed(6);
    });

    // Refresh map when modal is shown
    var modal = document.getElementById('mapModal');
    modal.addEventListener('shown.bs.modal', function () {
        map.invalidateSize();
    });
</script>

@endsection
