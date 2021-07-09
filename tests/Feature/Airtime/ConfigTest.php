<?php

namespace Tomsgad\Beem\Tests\Feature\Airtime;

use Tomsgad\Beem\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_can_set_the_api_key()
    {
        $this->app['config']->set(['app.BEEM_AIRTIME_API_KEY' => 'test_api_key']);

        $this->assertEquals('test_api_key', $this->app['config']->get('app.BEEM_AIRTIME_API_KEY'));
    }

    /** @test */
    public function it_can_set_the_secret_key()
    {
        $this->app['config']->set(['app.BEEM_AIRTIME_SECRET_KEY' => 'test_secret_key']);

        $this->assertEquals('test_secret_key', $this->app['config']->get('app.BEEM_AIRTIME_SECRET_KEY'));
    }
}
