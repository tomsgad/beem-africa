<?php

namespace Tomsgad\Beem\Tests\Feature\SMS;

use Tomsgad\Beem\SMS\BeemMessage;
use Tomsgad\Beem\Tests\TestCase;

class BeemMessageTest extends TestCase
{
    /** @test */
    public function it_can_set_the_content(): void
    {
        $message = (new BeemMessage())->content('hello');

        $this->assertEquals('hello', $message->content);
    }

    /** @test */
    public function it_can_set_the_sender(): void
    {
        $message = (new BeemMessage())->sender('Beem Africa');

        $this->assertEquals('Beem Africa', $message->sender);
    }

    /** @test */
    public function it_can_set_the_api_key(): void
    {
        $message = (new BeemMessage())->apiKey('Test API Key');

        $this->assertEquals('Test API Key', $message->apiKey);
    }

    /** @test */
    public function it_can_set_the_secret_key(): void
    {
        $message = (new BeemMessage())->secretKey('Test Secret Key');

        $this->assertEquals('Test Secret Key', $message->secretKey);
    }
}
