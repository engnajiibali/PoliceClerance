<?php

namespace App\Http\Controllers;

use App\Exports\PersonExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function PersonExport()
    {
        return Excel::download(new PersonExport, 'persons.xlsx');
    }
}
