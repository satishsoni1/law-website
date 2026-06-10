<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class SeoController extends AdminController
{
    private array $pages = [
        'home'        => 'Home Page',
        'about'       => 'About College',
        'courses'     => 'Courses',
        'faculty'     => 'Faculty',
        'admissions'  => 'Admissions',
        'notices'     => 'Notices',
        'news'        => 'News & Events',
        'gallery'     => 'Gallery',
        'downloads'   => 'Downloads',
        'contact'     => 'Contact',
    ];

    public function index()
    {
        $pages    = $this->pages;
        $seoMetas = SeoMeta::all()->keyBy('page_identifier');
        return view('admin.seo.index', compact('pages', 'seoMetas'));
    }

    public function edit(string $page)
    {
        abort_unless(array_key_exists($page, $this->pages), 404);
        $seo      = SeoMeta::firstOrNew(['page_identifier' => $page]);
        $pageName = $this->pages[$page];
        return view('admin.seo.edit', compact('seo', 'pageName', 'page'));
    }

    public function update(Request $request, string $page)
    {
        $data = $request->validate([
            'meta_title'       => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords'    => 'nullable|string|max:500',
            'og_title'         => 'nullable|string|max:255',
            'og_description'   => 'nullable|string|max:500',
            'og_image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'canonical_url'    => 'nullable|url',
        ]);

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        SeoMeta::updateOrCreate(['page_identifier' => $page], $data);
        ActivityLog::record('update', "Updated SEO for: $page");

        return redirect()->route('admin.seo.index')->with('success', 'SEO settings saved.');
    }
}
