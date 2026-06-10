<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        try {
            View::composer('*', function ($view) {
                $view->with('siteName', Setting::get('college_name', "K.T.S.P.M's Law College, Khopoli"));
            });
        } catch (\Exception $e) {
            // DB might not exist yet during migrations
        }
    }
}
