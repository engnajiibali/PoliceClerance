<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Models\Application;
use Illuminate\Http\Request;

class GuarantorController extends Controller
{
    public function index()
    {
        $pageTitle = "Guarantors";
        $subTitle = "List of Guarantors";
        $guarantors = Guarantor::with('application')->latest()->get();
        return view('guarantors.index', compact('guarantors', 'pageTitle', 'subTitle'));
    }

    public function create()
    {
        $pageTitle = "Guarantors";
        $subTitle = "Add New Guarantor";
        $applications = Application::all();
        return view('guarantors.create', compact('pageTitle', 'subTitle', 'applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'full_name' => 'required|string|max:150',
            'national_id' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'relationship' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        Guarantor::create($request->all());

        return redirect()->route('guarantors.index')->with('success', 'Guarantor added successfully.');
    }

    public function show($id)
    {
        $pageTitle = "Guarantors";
        $subTitle = "Guarantor Details";
        $guarantor = Guarantor::with('application')->findOrFail($id);
        return view('guarantors.show', compact('guarantor', 'pageTitle', 'subTitle'));
    }

    public function edit($id)
    {
        $pageTitle = "Guarantors";
        $subTitle = "Edit Guarantor";
        $guarantor = Guarantor::findOrFail($id);
        $applications = Application::all();
        return view('guarantors.edit', compact('guarantor', 'applications', 'pageTitle', 'subTitle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'full_name' => 'required|string|max:150',
            'national_id' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'relationship' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        $guarantor = Guarantor::findOrFail($id);
        $guarantor->update($request->all());

        return redirect()->route('guarantors.index')->with('success', 'Guarantor updated successfully.');
    }

    public function destroy($id)
    {
        $guarantor = Guarantor::findOrFail($id);
        $guarantor->delete();

        return redirect()->route('guarantors.index')->with('success', 'Guarantor deleted successfully.');
    }
}
