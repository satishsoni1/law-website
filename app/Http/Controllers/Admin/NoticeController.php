<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends AdminController
{
    public function index()
    {
        $notices = Notice::orderBy('is_pinned', 'desc')->orderBy('publish_date', 'desc')->paginate(20);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'attachment'   => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'publish_date' => 'required|date',
            'expiry_date'  => 'nullable|date|after:publish_date',
            'is_pinned'    => 'boolean',
            'is_active'    => 'boolean',
        ]);

        $data['is_pinned'] = $request->boolean('is_pinned');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('notices', 'public');
        }

        $notice = Notice::create($data);
        ActivityLog::record('create', "Created notice: {$notice->title}", $notice);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'attachment'   => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'publish_date' => 'required|date',
            'expiry_date'  => 'nullable|date',
            'is_pinned'    => 'boolean',
            'is_active'    => 'boolean',
        ]);

        $data['is_pinned'] = $request->boolean('is_pinned');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('attachment')) {
            if ($notice->attachment) {
                Storage::disk('public')->delete($notice->attachment);
            }
            $data['attachment'] = $request->file('attachment')->store('notices', 'public');
        }

        $notice->update($data);
        ActivityLog::record('update', "Updated notice: {$notice->title}", $notice);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->attachment) {
            Storage::disk('public')->delete($notice->attachment);
        }
        ActivityLog::record('delete', "Deleted notice: {$notice->title}", $notice);
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted.');
    }
}
