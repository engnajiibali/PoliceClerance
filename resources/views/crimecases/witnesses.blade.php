@extends('crimecases.layout')

@section('case-content')
     <h5>Witnesses for Case #{{ $crimecase->case_number }}</h5>
  @if($crimecase->witnesses->count())
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Person ID</th><th>Name</th></tr></thead>
      <tbody>
        @foreach($crimecase->witnesses as $key => $witness)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $witness->persons->id ?? 'Unknown' }}</td>
            <td>{{ $witness->persons->FullName ?? 'Unknown' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p class="text-muted">No witnesses found.</p>
  @endif
@endsection





