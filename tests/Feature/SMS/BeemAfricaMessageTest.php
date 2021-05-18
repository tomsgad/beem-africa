<?php

namespace Tomsgad\BeemAfrica\Tests\Feature\SMS;

use Tomsgad\BeemAfrica\SMS\BeemAfricaMessage;
use Tomsgad\BeemAfrica\Tests\TestCase;

class BeemAfricaMessageTest extends TestCase
{
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
