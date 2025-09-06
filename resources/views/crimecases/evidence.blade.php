@extends('crimecases.layout')

@section('case-content')
     <h5>Evidence for Case #{{ $crimecase->case_number }}</h5>
  @if($crimecase->evidence->count())
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Description</th><th>File</th></tr></thead>
      <tbody>
        @foreach($crimecase->evidence as $key => $item)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->description ?? '-' }}</td>
            <td>
              @if($item->file_path)
                <a href="{{ asset('storage/evidence/'.$item->file_path) }}" target="_blank">View File</a>
              @else
                -
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p class="text-muted">No evidence found.</p>
  @endif
@endsection












