<?php

namespace Tomsgad\Beem\Tests\Feature\Airtime;

use Tomsgad\Beem\Airtime\Beem;
use Tomsgad\Beem\Tests\TestCase;

class BeemTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiate()
    {
        $testConfig = [
            'airtime_api_key' => 'test_api_key',
            'airtime_secret_key' => 'test_secret_key',
        ];

        $instance = new Beem($testConfig);

        $this->assertInstanceOf(Beem::class, $instance);
    }
}
