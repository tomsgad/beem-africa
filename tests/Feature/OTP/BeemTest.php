<?php

namespace Tomsgad\Beem\Tests\Feature\OTP;

use Tomsgad\Beem\OTP\Beem;
use Tomsgad\Beem\Tests\TestCase;

class BeemTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiate()
    {
        $testConfig = [
            'otp_app_id' => '123',
            'otp_api_key' => 'test_api_key',
            'otp_secret_key' => 'test_secret_key',
        ];

        $instance = new Beem($testConfig);

        $this->assertInstanceOf(Beem::class, $instance);
    }
}
