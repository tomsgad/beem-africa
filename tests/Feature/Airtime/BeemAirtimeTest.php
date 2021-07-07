<?php

namespace Tomsgad\Beem\Tests\Feature\Airtime;

use Tomsgad\Beem\Airtime\BeemAirtime;
use Tomsgad\Beem\Tests\TestCase;

class BeemAirtimeTest extends TestCase
{
    /** @test */
    public function it_can_set_the_api_key(): void
    {
        $airtime = (new BeemAirtime())->apiKey('Test API Key');

        $this->assertEquals('Test API Key', $airtime->apiKey);
    }

    /** @test */
    public function it_can_set_the_secret_key(): void
    {
        $airtime = (new BeemAirtime())->secretKey('Test Secret Key');

        $this->assertEquals('Test Secret Key', $airtime->secretKey);
    }
}
