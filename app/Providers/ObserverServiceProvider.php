<?php

namespace App\Providers;

use App\Models\ProjectRoomProduct;
use App\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        ProjectRoomProduct::observe(ProjectObserver::class);
    }
}
