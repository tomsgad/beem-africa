<?php

namespace Tomsgad\Beem\Tests\Feature\Airtime;

use Tomsgad\Beem\Airtime\Beem;
use Tomsgad\Beem\Airtime\BeemChannel;
use Tomsgad\Beem\Tests\TestCase;

class BeemChannelTest extends TestCase
{
    /** @var Tomsgad\Beem\Airtime\Beem */
    protected $beem;

    /** @var Tomsgad\Beem\Airtime\BeemChannel */
    protected $beemChannel;

    public function setUp(): void
    {
        parent::setUp();

        $testConfig = [
            'airtime_api_key' => 'test_api_key',
            'airtime_secret_key' => 'test_secret_key',
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
