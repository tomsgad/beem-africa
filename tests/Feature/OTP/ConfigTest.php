<?php

namespace Tomsgad\Beem\Tests\Feature\OTP;

use Tomsgad\Beem\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_can_set_the_app_id()
    {
        $this->app['config']->set(['app.BEEM_OTP_APP_ID' => '123']);

        $this->assertEquals('123', $this->app['config']->get('app.BEEM_OTP_APP_ID'));
    }

    /** @test */
    public function it_can_set_the_api_key()
    {
        $this->app['config']->set(['app.BEEM_OTP_API_KEY' => 'test_api_key']);

        $this->assertEquals('test_api_key', $this->app['config']->get('app.BEEM_OTP_API_KEY'));
    }

    /** @test */
    public function it_can_set_the_secret_key()
    {
        $this->app['config']->set(['app.BEEM_OTP_SECRET_KEY' => 'test_secret_key']);

        $this->assertEquals('test_secret_key', $this->app['config']->get('app.BEEM_OTP_SECRET_KEY'));
    }
}
