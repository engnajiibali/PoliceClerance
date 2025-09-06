@extends('include.master')
@section('content')
<div class="content">
    <div class="card w-100">
        <div class="card-body">
            <h4>{{ $crimeType->name }}</h4>
            <p><strong>Category:</strong> {{ $crimeType->category?->name }}</p>
            <p><strong>Description:</strong> {{ $crimeType->description }}</p>
            <a href="{{ route('crime-types.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
