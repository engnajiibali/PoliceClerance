@extends('include.master')
@section('content')
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">{{ $pageTitle }}</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('crimes-cases.index') }}"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">{{ $pageTitle }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subTitle ?? '' }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <a href="{{ route('crimes-cases.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-circle-plus me-2"></i>Add Crime Case
            </a>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
    </div>

    <div class="card">
        <div class="card-body p-3">
            <h5>{{ $pageTitle }}</h5>

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Case #</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Date/Time</th>
                            <th>Types</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cases as $key => $case)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $case->case_number }}</td>
                            <td>{{ $case->title }}</td>
                            <td>{{ $case->location }}</td>
                            <td>
                                <span class="badge 
                                    {{ $case->status == 'Open' ? 'bg-success' : 
                                       ($case->status == 'Closed' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ $case->status }}
                                </span>
                            </td>
                            <td>{{ $case->date_time }}</td>
                            <td>
                                @foreach ($case->types as $type)
                                    <span class="badge bg-info">{{ $type->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('crimes-cases.show', $case->id) }}" class="btn btn-sm btn-light me-1" title="View">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="{{ route('crimes-cases.edit',$case->id) }}" class="btn btn-sm btn-info me-1">Edit</a>
                                <form action="{{ route('crimes-cases.destroy',$case->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this case?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No crime cases found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
