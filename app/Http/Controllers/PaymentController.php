<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Application;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('application')->paginate(10);
        $pageTitle = 'Payments';
        $subTitle = 'Payments';
        return view('payments.index', compact('payments', 'pageTitle', 'subTitle'));
    }

    public function create()
    {
        $applications = Application::all();
        return view('payments.create', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'amount' => 'required|numeric',
            'currency' => 'required|string|max:10',
            'payment_method' => 'required|string|max:50',
            'transaction_id' => 'nullable|string|max:100',
            'payment_date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created successfully!');
    }

    public function edit(Payment $payment)
    {
        $applications = Application::all();
        return view('payments.edit', compact('payment', 'applications'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'amount' => 'required|numeric',
            'currency' => 'required|string|max:10',
            'payment_method' => 'required|string|max:50',
            'transaction_id' => 'nullable|string|max:100',
            'payment_date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }


    public function paid()
{
    // Fetch only paid payments (status = completed)
    $payments = Payment::with(['application', 'application.applicant'])
                        ->where('status', 'completed')
                        ->get();

                       
    return view('payments.paid', compact('payments'))
           ->with(['pageTitle' => 'Paid Payments', 'subTitle' => 'Payments']);
}
}
