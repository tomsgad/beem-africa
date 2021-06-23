<?php

namespace Tomsgad\Beem\Tests;

use Orchestra\Testbench\TestCase as Item;
use Tomsgad\Beem\BeemServiceProvider;

class TestCase extends Item
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            BeemServiceProvider::class,
        ];
    }
}
