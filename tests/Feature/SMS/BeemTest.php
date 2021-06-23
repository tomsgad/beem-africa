<?php

namespace Tomsgad\Beem\Tests\Feature\SMS;

use Tomsgad\Beem\SMS\Beem;
use Tomsgad\Beem\Tests\TestCase;

class BeemTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiate()
    {
        $testConfig = [
            'sender_name' => 'INFO',
            'api_key' => 'test_api_key',
            'secret_key' => 'test_secret_key',
        ];

        $instance = new Beem($testConfig);

        $this->assertInstanceOf(Beem::class, $instance);
    }
}
