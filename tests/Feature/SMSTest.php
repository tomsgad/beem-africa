<?php

namespace Tomsgad\BeemAfrica\Tests\Feature;

use Tomsgad\BeemAfrica\SMS\BeemAfrica;
use Tomsgad\BeemAfrica\SMS\BeemAfricaMessage;
use Tomsgad\BeemAfrica\Tests\TestCase;

class SMSTest extends TestCase
{
    /** @test */
    public function test_config_env()
    {
        $this->app['config']->set(['app.BEEM_AFRICA_API_KEY' => 'TestAPIKey']);
        $this->app['config']->set(['app.BEEM_AFRICA_SECRET_KEY' => 'TestSecretKey']);
        $this->app['config']->set(['app.BEEM_AFRICA_SENDER_NAME' => 'Sender Name']);

        $this->assertEquals('Sender Name', $this->app['config']->get('app.BEEM_AFRICA_SENDER_NAME'));
        $this->assertEquals('TestAPIKey', $this->app['config']->get('app.BEEM_AFRICA_API_KEY'));
        $this->assertEquals('TestSecretKey', $this->app['config']->get('app.BEEM_AFRICA_SECRET_KEY'));
    }

    /** @test */
    public function it_can_be_instantiate()
    {
        $testConfig = [
            'api_key' => 'TEST_LOGIN',
            'secret_key' => 'TEST_PASSWORD',
            'sender_name' => 'INFO',
        ];

        $instance = new BeemAfrica($testConfig);

        $this->assertInstanceOf(BeemAfrica::class, $instance);
    }

    /** @test */
    public function it_can_set_the_content(): void
    {
        $message = (new BeemAfricaMessage())->content('hello');

        $this->assertEquals('hello', $message->content);
    }

    /** @test */
    public function it_can_set_the_sender(): void
    {
        $message = (new BeemAfricaMessage())->sender('Beem Africa');

        $this->assertEquals('Beem Africa', $message->sender);
    }

    /** @test */
    public function it_can_set_the_api_key(): void
    {
        $message = (new BeemAfricaMessage())->apiKey('Test API Key');

        $this->assertEquals('Test API Key', $message->apiKey);
    }

    /** @test */
    public function it_can_set_the_secret_key(): void
    {
        $message = (new BeemAfricaMessage())->secretKey('Test Secret Key');

        $this->assertEquals('Test Secret Key', $message->secretKey);
    }
}
