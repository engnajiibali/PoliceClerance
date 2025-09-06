@extends('crimecases.layout')

@section('case-content')
    <h5>Dhibanayaasha Kiiska #{{ $crimecase->case_number }}</h5>
    @if($crimecase->victims->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th><th>Person ID</th><th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crimecase->victims as $key => $victim)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $victim->persons->id ?? 'Unknown' }}</td>
                        <td>{{ $victim->persons->FullName ?? 'Unknown' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">No victims found.</p>
    @endif
@endsection
