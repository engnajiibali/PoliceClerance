@extends('include.master')
@section('content')
<div class="content">
    <div class="page-header">
        <h3 class="page-title">{{ $pageTitle }}</h3>
    </div>

    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Add Payment</a>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Application</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->application->id ?? '' }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->currency }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->status }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment?')">Delete</button>
                    </form>
                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">{{ $payments->links() }}</div>
</div>
@endsection
