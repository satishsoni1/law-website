<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComingSoon
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Setting::get('coming_soon') !== '1') {
            return $next($request);
        }

        // Allow through if the staging bypass session is active
        if ($request->session()->get('staging_access') === true) {
            return $next($request);
        }

        return redirect()->route('coming-soon');
    }
}
