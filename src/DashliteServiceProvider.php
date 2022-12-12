<?php

namespace Scott\Dashlite;

use Illuminate\Support\ServiceProvider;
use Scott\Dashlite\Console\DashliteCommand;

class DashliteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->runConsoleCommands();
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
}
