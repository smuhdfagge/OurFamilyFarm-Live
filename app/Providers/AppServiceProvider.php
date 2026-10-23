<?php

namespace App\Providers;

use App\Models\ContactSubmission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // The site is built with Tailwind, so use Laravel's Tailwind pagination links.
        Paginator::useTailwind();

        // The admin sidebar shows how many enquiries still need a reply.
        View::composer('layouts.admin', function ($view) {
            $view->with('newEnquiryCount', ContactSubmission::where('status', 'new')->count());
        });
    }
}
