<?php

namespace App\Providers;

use App\Models\Calendar;
use App\Models\User;
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
        //
        $events = Calendar::all();
        $user = Auth()->user();

        view()->share([
                "events"=> $events,
                "user"=> $user,
            ]);
    }
}
