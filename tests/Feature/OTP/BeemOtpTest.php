<?php

namespace Tomsgad\Beem\Tests\Feature\OTP;

use Tomsgad\Beem\OTP\BeemOtp;
use Tomsgad\Beem\Tests\TestCase;

class BeemOtpTest extends TestCase
{
    /** @test */
    public function it_can_set_the_app_id(): void
    {
        $otp = (new BeemOtp())->appId('112');

        $this->assertEquals('112', $otp->appId);
    }

    /** @test */
    public function it_can_set_the_api_key(): void
    {
        $otp = (new BeemOtp())->apiKey('Test API Key');

        $this->assertEquals('Test API Key', $otp->apiKey);
    }

    /** @test */
    public function it_can_set_the_secret_key(): void
    {
        $otp = (new BeemOtp())->secretKey('Test Secret Key');

        $this->assertEquals('Test Secret Key', $otp->secretKey);
    }
}
