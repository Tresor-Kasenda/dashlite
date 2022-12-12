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
    }

    public function register()
    {
    }

    protected function runConsoleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DashliteCommand::class
            ]);
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
