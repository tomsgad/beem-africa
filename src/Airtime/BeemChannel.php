<?php

namespace Tomsgad\Beem\Airtime;

class BeemChannel
{
    public $beem;

    /**
     * Beem Channel Constructor.
     *
     * @param Beem $beem
     */
    public function __construct(Beem $beem)
    {
        $this->beem = $beem;
    }

    /**
     * Transfer Airtime.
     *
     * @param BeemAirtime $airtime
     * @param string $recipient
     * * @param int $amount
     *
     * @throws Exception
     *
     * @return array|null
     */
    public function transfer($airtime, $recipient, $amount)
    {
        try {
            $response = $this->beem->transfer($airtime, $recipient, $amount);

            return $response;
        } catch (Exception $error) {
            return $error;
        }
    }
}
