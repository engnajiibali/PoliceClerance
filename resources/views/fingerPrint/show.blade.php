@extends('include.master')

@section('content')
<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Fingerprint Details</h3>
            </div>
        </div>
    </div>

    {{-- Success / Error Messages --}}
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

    {{-- Person Information --}}
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> Salmaan Haaji Saalax</p>
                    <p><strong>ID:</strong> 21585458</p>
                    <p><strong>Created at:</strong> 27 08/ 2025</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Fingerprint Records --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Collected Fingerprints</h5>
                </div>
                <div class="card-body">
                    @if($fingers->count() > 0)
                        <div class="row">
                            @foreach($fingers as $finger)
                                <div class="col-md-3 text-center mb-4">
                                    <div class="border rounded p-3">
                                        <h6 class="mb-2">{{ strtoupper(str_replace('_', ' ', $finger->finger_name)) }}</h6>
                                        @if($finger->finger_img && file_exists(public_path($finger->finger_img)))
                                            <img src="{{ asset('public/'.$finger->finger_img) }}" 
                                                 alt="Fingerprint" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="max-height: 150px;">
                                        @else
                                            <p class="text-muted">No image</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No fingerprints registered for this person.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
