<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $courses = Course::active()->get();
        return view('front.admissions.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name'   => 'required|string|max:255',
            'father_name'    => 'nullable|string|max:255',
            'mother_name'    => 'nullable|string|max:255',
            'dob'            => 'required|date|before:today',
            'gender'         => 'required|in:male,female,other',
            'mobile'         => 'required|string|size:10',
            'email'          => 'required|email',
            'address'        => 'nullable|string',
            'city'           => 'nullable|string|max:100',
            'state'          => 'nullable|string|max:100',
            'pincode'        => 'nullable|string|max:10',
            'category'       => 'required|in:general,obc,sc,st,nt,sbc',
            'qualification'  => 'required|string|max:255',
            'board_university' => 'nullable|string|max:255',
            'passing_year'   => 'nullable|string|max:4',
            'percentage'     => 'nullable|numeric|min:0|max:100',
            'course_id'      => 'required|exists:courses,id',
            'photo'          => 'required|image|mimes:jpg,jpeg,png|max:1024',
            'document_10th'  => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'document_12th'  => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'document_graduation' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'document_tc'    => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $data['academic_year'] = date('Y') . '-' . (date('Y') + 1);
        $data['status']        = 'pending';

        foreach (['photo', 'document_10th', 'document_12th', 'document_graduation', 'document_tc'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('admissions', 'public');
            }
        }

        $admission = Admission::create($data);

        return redirect()->route('admissions.success', $admission->application_no)
            ->with('success', 'Application submitted! Your application number is ' . $admission->application_no);
    }

    public function success(string $appNo)
    {
        $admission = Admission::where('application_no', $appNo)->firstOrFail();
        return view('front.admissions.success', compact('admission'));
    }
}
