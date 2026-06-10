<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Gallery::active()->withCount('images')->get();
        return view('front.gallery.index', compact('albums'));
    }

    public function show(string $slug)
    {
        $album = Gallery::where('slug', $slug)->where('is_active', true)->with('images')->firstOrFail();
        return view('front.gallery.show', compact('album'));
    }
}
