<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends AdminController
{
    public function index()
    {
        $news = News::latest('published_at')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'type'         => 'required|in:news,event',
            'event_date'   => 'nullable|date',
            'event_venue'  => 'nullable|string|max:255',
            'is_active'    => 'boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data['slug']     = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);
        $data['published_at'] = now();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news = News::create($data);
        ActivityLog::record('create', "Created news/event: {$news->title}", $news);

        return redirect()->route('admin.news.index')->with('success', 'Published successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'type'         => 'required|in:news,event',
            'event_date'   => 'nullable|date',
            'event_venue'  => 'nullable|string|max:255',
            'is_active'    => 'boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);
        ActivityLog::record('update', "Updated news/event: {$news->title}", $news);

        return redirect()->route('admin.news.index')->with('success', 'Updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        ActivityLog::record('delete', "Deleted news: {$news->title}", $news);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Deleted.');
    }
}
