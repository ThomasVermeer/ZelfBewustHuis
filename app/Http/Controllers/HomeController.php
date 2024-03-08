<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::all();
        $employee = Employee::all();
        $partner = Partner::all();

        $projects = Project::all();


        return view('homepage', compact('aboutUsData', 'employee', 'partner', 'projects'));
    }
}
