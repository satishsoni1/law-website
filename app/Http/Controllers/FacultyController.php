<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $teaching = Faculty::active()->whereIn('category', ['permanent', 'visiting'])->get();

        // The I/C Principal heads the faculty; everyone else is teaching staff.
        $principal = $teaching->first(fn ($m) => stripos($m->designation, 'principal') !== false);
        $teaching = $teaching->reject(fn ($m) => $principal && $m->id === $principal->id);

        $nonTeaching = Faculty::active()->nonTeaching()->get();

        return view('front.faculty', compact('principal', 'teaching', 'nonTeaching'));
    }
}
