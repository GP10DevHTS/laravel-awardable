<?php

namespace Gp10devhts\Awardable;

use Gp10devhts\Awardable\Commands\PublishCommand;
use Gp10devhts\Awardable\Commands\SeedCategoriesCommand;
use Illuminate\Support\ServiceProvider;

class AwardableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/awardable.php' => config_path('awardable.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__.'/../database/seeders/' => database_path('seeders'),
            ], 'seeders');

            $this->commands([
                PublishCommand::class,
                SeedCategoriesCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/awardable.php', 'awardable'
        );
    }
}
