<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders      = Slider::active()->get();
        $courses      = Course::active()->take(6)->get();
        $notices      = Notice::active()->latest()->take(8)->get();
        $news         = News::active()->news()->take(3)->get();
        $events       = News::active()->events()->take(3)->get();
        $faculty      = Faculty::active()->permanent()->take(6)->get();
        $testimonials = Testimonial::active()->take(6)->get();
        $galleries    = Gallery::active()->take(6)->get();

        return view('front.home', compact(
            'sliders', 'courses', 'notices', 'news', 'events', 'faculty', 'testimonials', 'galleries'
        ));
    }
}
