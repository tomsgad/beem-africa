<?php

namespace Tomsgad\BeemAfrica\Tests;

use Orchestra\Testbench\TestCase as Item;
use Tomsgad\BeemAfrica\BeemAfricaServiceProvider;

class TestCase extends Item
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            BeemAfricaServiceProvider::class,
        ];
    }
}
