<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::active()->get();
        return view('front.courses.index', compact('courses'));
    }

    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('front.courses.show', compact('course'));
    }
}
