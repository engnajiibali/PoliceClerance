@extends('include.master')
@section('content')
<div class="content">

    <div class="page-header">
        <h3 class="page-title">Edit Payment</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <label>Application</label>
                        <select name="application_id" class="form-select">
                            @foreach($applications as $app)
                            <option value="{{ $app->id }}" {{ old('application_id', $payment->application_id) == $app->id ? 'selected' : '' }}>
                                {{ $app->id }} - {{ $app->application_type }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" value="{{ old('amount', $payment->amount) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" value="{{ old('currency', $payment->currency) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Payment Method</label>
                        <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method', $payment->payment_method) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Transaction ID</label>
                        <input type="text" name="transaction_id" class="form-control" value="{{ old('transaction_id', $payment->transaction_id) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Payment Date</label>
                        <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $payment->payment_date) }}">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ old('status', $payment->status)=='pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ old('status', $payment->status)=='completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ old('status', $payment->status)=='failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('payments.index') }}" class="btn btn-outline-light border me-3">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
