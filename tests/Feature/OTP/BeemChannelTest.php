<?php

namespace Tomsgad\Beem\Tests\Feature\OTP;

use Tomsgad\Beem\OTP\Beem;
use Tomsgad\Beem\OTP\BeemChannel;
use Tomsgad\Beem\Tests\TestCase;

class BeemChannelTest extends TestCase
{
    /** @var Tomsgad\Beem\OTP\Beem */
    protected $beem;

    /** @var Tomsgad\Beem\OTP\BeemChannel */
    protected $beemChannel;

    public function setUp(): void
    {
        parent::setUp();

        $testConfig = [
            'otp_app_id' => '123',
            'otp_api_key' => 'test_api_key',
            'otp_secret_key' => 'test_secret_key',
        ];

        $this->beem = new Beem($testConfig);

        $this->beemChannel = new BeemChannel($this->beem);
    }

    /** @test */
    public function it_can_test()
    {
        $this->assertTrue(true);
    }
}
