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
        if (Setting::get('coming_soon') === '1') {
            return redirect()->route('coming-soon');
        }

        return $next($request);
    }
}
