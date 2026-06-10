<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'college_name'     => 'required|string|max:255',
            'college_tagline'  => 'nullable|string|max:255',
            'address'          => 'nullable|string',
            'phone'            => 'nullable|string|max:50',
            'email'            => 'nullable|email',
            'website'          => 'nullable|url',
            'facebook_url'     => 'nullable|url',
            'twitter_url'      => 'nullable|url',
            'instagram_url'    => 'nullable|url',
            'youtube_url'      => 'nullable|url',
            'whatsapp_number'  => 'nullable|string|max:20',
            'google_map_embed' => 'nullable|string',
            'logo'             => 'nullable|image|mimes:png,jpg,svg|max:2048',
            'favicon'          => 'nullable|image|mimes:png,ico|max:512',
            'footer_text'      => 'nullable|string',
            'about_short'      => 'nullable|string',
            'admission_open'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        foreach ($data as $key => $value) {
            if ($value !== null) {
                Setting::set($key, $value);
            }
        }

        ActivityLog::record('update', 'Updated site settings');

        return back()->with('success', 'Settings saved.');
    }

    public function sliders()
    {
        $sliders = \App\Models\Slider::orderBy('order')->get();
        return view('admin.settings.sliders', compact('sliders'));
    }

    public function storeSlider(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'button_text' => 'nullable|string|max:50',
            'button_url'  => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
        ]);
        $data['image']     = $request->file('image')->store('sliders', 'public');
        $data['is_active'] = true;
        \App\Models\Slider::create($data);
        return back()->with('success', 'Slide added.');
    }

    public function destroySlider(\App\Models\Slider $slider)
    {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($slider->image);
        $slider->delete();
        return back()->with('success', 'Slide deleted.');
    }

    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::orderBy('order')->paginate(20);
        return view('admin.settings.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'course'      => 'nullable|string|max:255',
            'content'     => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating'      => 'nullable|integer|min:1|max:5',
            'order'       => 'nullable|integer',
        ]);
        $data['is_active'] = true;
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('testimonials', 'public');
        }
        \App\Models\Testimonial::create($data);
        return back()->with('success', 'Testimonial added.');
    }

    public function destroyTestimonial(\App\Models\Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->photo);
        }
        $testimonial->delete();
        return back()->with('success', 'Deleted.');
    }
}
