<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news   = News::active()->news()->paginate(9);
        $events = News::active()->events()->paginate(9);
        return view('front.news.index', compact('news', 'events'));
    }

    public function show(string $slug)
    {
        $item   = News::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $item->increment('views');
        $related = News::active()->where('type', $item->type)->where('id', '!=', $item->id)->take(3)->get();
        return view('front.news.show', compact('item', 'related'));
    }
}
