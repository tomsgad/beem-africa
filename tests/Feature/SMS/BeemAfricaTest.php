<?php

namespace Tomsgad\BeemAfrica\Tests\Feature\SMS;

use Tomsgad\BeemAfrica\SMS\BeemAfrica;
use Tomsgad\BeemAfrica\Tests\TestCase;

class BeemAfricaTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiate()
    {
        $testConfig = [
            'sender_name' => 'INFO',
            'api_key' => 'test_api_key',
            'secret_key' => 'test_secret_key',
        ];

        $instance = new BeemAfrica($testConfig);

        $this->assertInstanceOf(BeemAfrica::class, $instance);
    }
}
