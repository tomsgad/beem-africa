<?php

namespace Tomsgad\BeemAfrica\Tests\Feature\SMS;

use Tomsgad\BeemAfrica\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_can_set_the_sender_name()
    {
        $this->app['config']->set(['app.BEEM_AFRICA_SENDER_NAME' => 'INFO']);

        $this->assertEquals('INFO', $this->app['config']->get('app.BEEM_AFRICA_SENDER_NAME'));
    }

    /** @test */
    public function it_can_set_the_api_key()
    {
        $this->app['config']->set(['app.BEEM_AFRICA_API_KEY' => 'test_api_key']);

        $this->assertEquals('test_api_key', $this->app['config']->get('app.BEEM_AFRICA_API_KEY'));
    }

    /** @test */
    public function it_can_set_the_secret_key()
    {
        $this->app['config']->set(['app.BEEM_AFRICA_SECRET_KEY' => 'test_secret_key']);

        $this->assertEquals('test_secret_key', $this->app['config']->get('app.BEEM_AFRICA_SECRET_KEY'));
    }
}
