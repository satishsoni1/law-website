<?php

namespace App\Http\Controllers;

use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::active()
            ->get()
            ->groupBy('category');
        return view('front.downloads', compact('downloads'));
    }

    public function download(Download $download)
    {
        $download->incrementDownload();
        return response()->download(storage_path('app/public/' . $download->file));
    }
}
