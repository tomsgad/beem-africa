<?php

namespace Tomsgad\Beem\OTP;

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
     * Request PIN.
     *
     * @param BeemOtp $otp
     * @param string $recipient
     *
     * @throws Exception
     *
     * @return array|null
     */
    public function requestPin($otp, $recipient)
    {
        try {
            $response = $this->beem->requestPin($otp, $recipient);

            return $response;
        } catch (Exception $error) {
        	return $error;
        }
    }

    /**
     * Verify PIN.
     *
     * @param BeemOtp $otp
     * @param string $pinId
     * @param string $pin
     *
     * @throws Exception
     *
     * @return array|null
     */
    public function verifyPin($otp, $pinId, $pin)
    {
    	try {
            $response = $this->beem->verifyPin($otp, $pinId, $pin);

            return $response;
        } catch (Exception $error) {
        	return $error;
        }
    }
}
