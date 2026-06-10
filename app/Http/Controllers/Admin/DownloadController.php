<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends AdminController
{
    public function index()
    {
        $downloads = Download::orderBy('category')->orderBy('order')->paginate(20);
        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        $categories = ['prospectus' => 'Prospectus', 'admission_form' => 'Admission Form', 'circular' => 'Circular', 'timetable' => 'Timetable', 'syllabus' => 'Syllabus', 'other' => 'Other'];
        return view('admin.downloads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file'        => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'category'    => 'required|in:prospectus,admission_form,circular,timetable,syllabus,other',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['file']      = $request->file('file')->store('downloads', 'public');
        $data['file_type'] = $request->file('file')->getClientOriginalExtension();

        $download = Download::create($data);
        ActivityLog::record('create', "Uploaded: {$download->title}", $download);

        return redirect()->route('admin.downloads.index')->with('success', 'File uploaded.');
    }

    public function edit(Download $download)
    {
        $categories = ['prospectus' => 'Prospectus', 'admission_form' => 'Admission Form', 'circular' => 'Circular', 'timetable' => 'Timetable', 'syllabus' => 'Syllabus', 'other' => 'Other'];
        return view('admin.downloads.edit', compact('download', 'categories'));
    }

    public function update(Request $request, Download $download)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'category'    => 'required|in:prospectus,admission_form,circular,timetable,syllabus,other',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('file')) {
            if ($download->file) Storage::disk('public')->delete($download->file);
            $data['file']      = $request->file('file')->store('downloads', 'public');
            $data['file_type'] = $request->file('file')->getClientOriginalExtension();
        }

        $download->update($data);
        ActivityLog::record('update', "Updated download: {$download->title}", $download);

        return redirect()->route('admin.downloads.index')->with('success', 'Updated.');
    }

    public function destroy(Download $download)
    {
        if ($download->file) Storage::disk('public')->delete($download->file);
        ActivityLog::record('delete', "Deleted download: {$download->title}", $download);
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('success', 'Deleted.');
    }
}
