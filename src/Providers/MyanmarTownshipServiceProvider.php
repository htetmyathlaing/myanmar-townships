<?php

namespace HtetMyatHlaing\MyanmarTownships\Providers;

use Illuminate\Support\ServiceProvider;

class MyanmarTownshipServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            "myanmartownships",
            "HtetMyatHlaing\MyanmarTownships\MyanmarTownship"
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config/townships.php', 'townships');
    }
}
