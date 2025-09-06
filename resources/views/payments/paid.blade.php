@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Paid Payments</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Application ID</th>
                        <th>Applicant</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Payment Method</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        @if($payment->status == 'completed')
                        @php
                            // Check if crime record exists
                            $crime = \App\Models\Crime::where('application_id', $payment->application->id ?? 0)->first();
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->application->id ?? '-' }}</td>
                            <td>{{ $payment->application->applicant->FullName ?? '-' }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->currency }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>
                                <form action="{{ route('crimes.check',$payment->application->id) }}" method="POST">
                                    @csrf
                                    @if($crime)
                                        <button class="btn btn-secondary" disabled>Checked</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Check / Generate Certificate</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
