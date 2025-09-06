@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Payment Details</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <strong>Application ID:</strong> {{ $payment->application->id ?? 'N/A' }} <br>
                    <strong>Application Type:</strong> {{ $payment->application->application_type ?? 'N/A' }}
                </div>
                <div class="col-sm-6">
                    <strong>Amount:</strong> {{ $payment->amount }} {{ $payment->currency }} <br>
                    <strong>Payment Method:</strong> {{ $payment->payment_method }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <strong>Transaction ID:</strong> {{ $payment->transaction_id ?? '-' }} <br>
                    <strong>Payment Date:</strong> {{ $payment->payment_date }}
                </div>
                <div class="col-sm-6">
                    <strong>Status:</strong> 
                    @if($payment->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($payment->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                    @else
                        <span class="badge bg-danger">{{ ucfirst($payment->status) }}</span>
                    @endif
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end gap-2">
                <a href="{{ route('payments.index') }}" class="btn btn-outline-light border">Back</a>

                <!-- Show Pay Button only if pending -->
                @if($payment->status == 'pending')
                <form action="{{ route('payments.pay', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
