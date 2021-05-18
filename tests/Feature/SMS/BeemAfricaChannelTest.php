<?php

namespace Tomsgad\BeemAfrica\Tests\Feature\SMS;

use Illuminate\Notifications\Notifiable;
use Tomsgad\BeemAfrica\Exceptions\SMS\InvalidConfiguration;
use Tomsgad\BeemAfrica\SMS\BeemAfrica;
use Tomsgad\BeemAfrica\SMS\BeemAfricaChannel;
use Tomsgad\BeemAfrica\Tests\TestCase;

class BeemAfricaChannelTest extends TestCase
{
    /** @var Tomsgad\BeemAfrica\SMS\BeemAfrica */
    protected $beemAfrica;

    /** @var Tomsgad\BeemAfrica\SMS\BeemAfricaChannel */
    protected $beemAfricaChannel;

    public function setUp(): void
    {
        parent::setUp();

        $testConfig = [
            'sender_name' => 'INFO',
            'api_key' => 'test_api_key',
            'secret_key' => 'test_secret_key',
        ];

        $this->beemAfrica = new BeemAfrica($testConfig);

        $this->beemAfricaChannel = new BeemAfricaChannel($this->beemAfrica);
    }

    /** @test */
    public function it_can_throw_exception_when_no_route_for_beem_africa()
    {
        $this->expectException("Error");

        $this->beemAfricaChannel->getRecipients(new NotifiableWithRouteForBeemAfrica());
    }
}

/**
 * Class NotifiableWithoutRouteForBeemAfrica.
 */
class NotifiableWithoutRouteForBeemAfrica
{
    use Notifiable;
}
