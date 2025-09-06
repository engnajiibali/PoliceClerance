<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
class DashboardController extends Controller
{
   /**
* Display the dashboard based on the user's role.
*
* @return \Illuminate\View\View
*/
public function index()
{
$PageTitle = "Admin Panel";
      $maleCount = persons::where('Gender', 'Male')->count();
        $femaleCount = persons::where('Gender', 'Female')->count();
return view('dashboard.index', compact('PageTitle','maleCount','femaleCount'));
}
}
