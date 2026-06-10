<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends AdminController
{
    public function index()
    {
        $galleries = Gallery::withCount('images')->orderBy('order')->paginate(20);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:photo,video',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['slug']     = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('gallery', 'public');
        }

        $gallery = Gallery::create($data);
        ActivityLog::record('create', "Created album: {$gallery->title}", $gallery);

        return redirect()->route('admin.gallery.show', $gallery)->with('success', 'Album created. Now add images.');
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('images');
        return view('admin.gallery.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:photo,video',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('cover_image')) {
            if ($gallery->cover_image) {
                Storage::disk('public')->delete($gallery->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('gallery', 'public');
        }

        $gallery->update($data);
        ActivityLog::record('update', "Updated album: {$gallery->title}", $gallery);

        return redirect()->route('admin.gallery.index')->with('success', 'Album updated.');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $img) {
            if ($img->image) Storage::disk('public')->delete($img->image);
        }
        if ($gallery->cover_image) Storage::disk('public')->delete($gallery->cover_image);
        ActivityLog::record('delete', "Deleted album: {$gallery->title}", $gallery);
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Album deleted.');
    }

    public function uploadImages(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery/' . $gallery->id, 'public');
            GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image'      => $path,
                'order'      => $gallery->images()->max('order') + 1,
            ]);
        }

        return back()->with('success', 'Images uploaded.');
    }

    public function destroyImage(GalleryImage $image)
    {
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return back()->with('success', 'Image removed.');
    }
}
