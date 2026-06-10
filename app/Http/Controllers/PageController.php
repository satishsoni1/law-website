<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('front.about');
    }

    public function infrastructure()
    {
        return view('front.infrastructure');
    }

    public function affiliation()
    {
        return view('front.affiliation');
    }

    public function antiRagging()
    {
        return view('front.anti-ragging');
    }

    public function rti()
    {
        return view('front.rti');
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function terms()
    {
        return view('front.terms');
    }

    // ── KTSP Mandal Pages ──────────────────────────────────────────────────────

    public function mandal()
    {
        return view('front.mandal.about');
    }

    public function governingBody()
    {
        return view('front.mandal.governing-body');
    }

    public function chairmanMessage()
    {
        return view('front.mandal.chairman-message');
    }

    public function viceChairmanMessage()
    {
        return view('front.mandal.vice-chairman-message');
    }

    public function secretaryMessage()
    {
        return view('front.mandal.secretary-message');
    }

    public function principalMessage()
    {
        return view('front.mandal.principal-message');
    }
}
