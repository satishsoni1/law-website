<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends AdminController
{
    public function index()
    {
        $courses = Course::orderBy('order')->paginate(20);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'short_name'       => 'nullable|string|max:50',
            'description'      => 'nullable|string',
            'duration'         => 'required|string|max:100',
            'intake'           => 'nullable|integer',
            'fees'             => 'nullable|string|max:100',
            'eligibility'      => 'nullable|string',
            'medium'           => 'nullable|string|max:100',
            'affiliation'      => 'nullable|string|max:255',
            'brochure'         => 'nullable|file|mimes:pdf|max:5120',
            'is_active'        => 'boolean',
            'order'            => 'nullable|integer',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('brochures', 'public');
        }

        $course = Course::create($data);
        ActivityLog::record('create', "Created course: {$course->name}", $course);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'short_name'       => 'nullable|string|max:50',
            'description'      => 'nullable|string',
            'duration'         => 'required|string|max:100',
            'intake'           => 'nullable|integer',
            'fees'             => 'nullable|string|max:100',
            'eligibility'      => 'nullable|string',
            'medium'           => 'nullable|string|max:100',
            'affiliation'      => 'nullable|string|max:255',
            'brochure'         => 'nullable|file|mimes:pdf|max:5120',
            'is_active'        => 'boolean',
            'order'            => 'nullable|integer',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('brochures', 'public');
        }

        $course->update($data);
        ActivityLog::record('update', "Updated course: {$course->name}", $course);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        ActivityLog::record('delete', "Deleted course: {$course->name}", $course);
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }
}
