<?php

namespace Tomsgad\Beem\Tests\Feature\SMS;

use Illuminate\Notifications\Notifiable;
use Tomsgad\Beem\SMS\Beem;
use Tomsgad\Beem\SMS\BeemChannel;
use Tomsgad\Beem\Tests\TestCase;

class BeemChannelTest extends TestCase
{
    /** @var Tomsgad\Beem\SMS\Beem */
    protected $beem;

    /** @var Tomsgad\Beem\SMS\BeemChannel */
    protected $beemChannel;

    public function setUp(): void
    {
        parent::setUp();

        $testConfig = [
            'sender_name' => 'INFO',
            'api_key' => 'test_api_key',
            'secret_key' => 'test_secret_key',
        ];

        $this->beem = new Beem($testConfig);

        $this->beemChannel = new BeemChannel($this->beem);
    }

    /** @test */
    public function it_can_throw_exception_when_no_route_for_beem()
    {
        $this->expectException('Error');

        $this->beemChannel->getRecipients(new NotifiableWithRouteForBeem());
    }
}

/**
 * Class NotifiableWithoutRouteForBeem.
 */
class NotifiableWithoutRouteForBeem
{
    use Notifiable;
}
