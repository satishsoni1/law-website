<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admission;
use App\Models\ContactMessage;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\News;
use App\Models\Notice;

class DashboardController extends AdminController
{
    public function index()
    {
        $stats = [
            'total_admissions'   => Admission::count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
            'approved_admissions'=> Admission::where('status', 'approved')->count(),
            'total_courses'      => Course::count(),
            'total_faculty'      => Faculty::count(),
            'total_notices'      => Notice::count(),
            'unread_messages'    => ContactMessage::where('is_read', false)->count(),
            'total_news'         => News::count(),
        ];

        $recent_admissions = Admission::with('course')
            ->latest()
            ->take(10)
            ->get();

        $recent_messages = ContactMessage::where('is_read', false)
            ->latest()
            ->take(5)
            ->get();

        $admission_trends = Admission::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month');

        return view('admin.dashboard', compact('stats', 'recent_admissions', 'recent_messages', 'admission_trends'));
    }
}
