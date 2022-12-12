<?php

namespace Scott\Dashlite\Console;

use Illuminate\Console\Command;

class DashliteCommand extends Command
{
    protected $signature = 'dashlite:install';

    protected $description = "Install all dependencies of dashlite";

    public function handle()
    {
        $this->info('Installing BlogPackage...');
    }
}
