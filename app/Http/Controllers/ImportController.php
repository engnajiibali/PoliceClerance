<?php

namespace App\Http\Controllers;

use App\Imports\PersonImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportController extends Controller
{
  public function importPersons(Request $request)
    {
        $request->validate([
            'importFile' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PersonImport, $request->file('importFile'));

        return redirect()->back()->with('success', 'Persons imported successfully!');
    }
}
