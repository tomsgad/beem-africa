<?php

namespace Tomsgad\Beem\OTP;

class BeemChannel
{
    public $beem;

    /**
     * Beem  Channel Constructor.
     *
     * @param Beem $beem
     */
    public function __construct(Beem $beem)
    {
        $this->beem = $beem;
    }

    /**
     * Request PIN .
     *
     * @param  int  $recipient
     * @param BeemOtp $otp
     *
     * @throws Exception
     *
     * @return array|null
     */
    public function requestPin($recipient)
    {
        try {
            $response = $this->beem->requestPin($recipient);

            return $response;
        } catch (Exception $e) {
        }
    }
}
