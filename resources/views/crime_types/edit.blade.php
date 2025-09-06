@extends('include.master')
@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <h2 class="mb-1">{{$pageTitle}}</h2>
    </div>

    <div class="card w-100">
        <div class="card-body">
            <form method="POST" action="{{ route('crime-types.update',$crimeType->id) }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Crime Type Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name',$crimeType->name) }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id',$crimeType->category_id)==$cat->id)?'selected':'' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description',$crimeType->description) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('crime-types.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
