<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        HeadingRowFormatter::default('slug');
        // if (config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
