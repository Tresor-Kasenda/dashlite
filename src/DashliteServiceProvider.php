<?php

namespace Scott\Dashlite;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Scott\Dashlite\Console\DashliteCommand;

class DashliteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->runConsoleCommands();

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dashlite');

        //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dashlite.php', 'dashlite');
    }

    protected function runConsoleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DashliteCommand::class
            ]);

            $this->publishes([
                __DIR__.'/../config/dashlite.php' => config_path('dashlite.php'),
            ], 'dashlite');

//            $this->publishes([
//                __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
//            ], 'migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/dashlite'),
            ], 'views');
        }
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration(): array
    {
        return [
            'prefix' => config('dashlite.prefix'),
            'middleware' => config('dashlite.middleware'),
        ];
    }
}
