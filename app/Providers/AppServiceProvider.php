<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //  Pass settings to all views
        View::composer('*', function ($view) {
            $settings = \App\Models\GlobalSetting::query()->first();
            $services = Service::all();
            $view->with('pagedata', $settings)->with('allServices', $services);
        });

        View::composer('*', function ($view) {
            $notifications = Notification::where('seen', 'unread')->orderBy('created_at', 'desc')->get();
            $view->with('notifications', $notifications);
        });

    }
}
