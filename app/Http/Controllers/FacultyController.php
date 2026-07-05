<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $permanent   = Faculty::active()->permanent()->get();
        $visiting    = Faculty::active()->visiting()->get();
        $nonTeaching = Faculty::active()->nonTeaching()->get();
        return view('front.faculty', compact('permanent', 'visiting', 'nonTeaching'));
    }
}
