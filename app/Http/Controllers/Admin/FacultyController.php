<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends AdminController
{
    public function index()
    {
        $faculty = Faculty::orderBy('category')->orderBy('order')->paginate(20);
        return view('admin.faculty.index', compact('faculty'));
    }

    public function create()
    {
        return view('admin.faculty.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'required|string|max:255',
            'qualification'  => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'experience'     => 'nullable|integer',
            'bio'            => 'nullable|string',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email'          => 'nullable|email',
            'phone'          => 'nullable|string|max:20',
            'category'       => 'required|in:permanent,visiting',
            'order'          => 'nullable|integer',
            'is_active'      => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('faculty', 'public');
        }

        $faculty = Faculty::create($data);
        ActivityLog::record('create', "Added faculty: {$faculty->name}", $faculty);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added.');
    }

    public function edit(Faculty $faculty)
    {
        return view('admin.faculty.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'required|string|max:255',
            'qualification'  => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'experience'     => 'nullable|integer',
            'bio'            => 'nullable|string',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email'          => 'nullable|email',
            'phone'          => 'nullable|string|max:20',
            'category'       => 'required|in:permanent,visiting',
            'order'          => 'nullable|integer',
            'is_active'      => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            if ($faculty->photo) {
                Storage::disk('public')->delete($faculty->photo);
            }
            $data['photo'] = $request->file('photo')->store('faculty', 'public');
        }

        $faculty->update($data);
        ActivityLog::record('update', "Updated faculty: {$faculty->name}", $faculty);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member updated.');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->photo) {
            Storage::disk('public')->delete($faculty->photo);
        }
        ActivityLog::record('delete', "Deleted faculty: {$faculty->name}", $faculty);
        $faculty->delete();
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member deleted.');
    }
}
