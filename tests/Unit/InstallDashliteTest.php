<?php

namespace Scott\Dashlite\Tests\Unit;

use Illuminate\Support\Facades\File;
use Scott\Dashlite\Tests\TestCase;

class InstallDashliteTest extends TestCase
{
    public function testInstallCommand()
    {
        $this->assertTrue(File::exists(config_path('dashlite.php')));
    }
}
