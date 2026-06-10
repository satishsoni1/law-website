<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $query = Notice::active()->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $notices = $query->paginate(15);
        return view('front.notices', compact('notices'));
    }

    public function download(Notice $notice)
    {
        if (!$notice->attachment) {
            abort(404);
        }
        $notice->increment('views');
        return response()->download(storage_path('app/public/' . $notice->attachment));
    }
}
