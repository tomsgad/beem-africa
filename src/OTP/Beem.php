<?php

namespace Tomsgad\Beem\OTP;

use GuzzleHttp\Client;

class Beem
{
    protected $pinRequestUrl = 'https://apiotp.beem.africa/v1/request';

    protected $verificationUrl = 'https://apiotp.beem.africa/v1/verify';

    protected $appId;

    protected $apiKey;

    protected $secretKey;

    /**
     * Beem Constructor.
     *
     * @param $config
     */
    public function __construct(array $config)
    {
        $this->appId = $config['otp_app_id'];
        $this->apiKey = $config['otp_api_key'];
        $this->secretKey = $config['otp_secret_key'];
    }

    /**
     * Request PIN using Beem.
     *
     * @param BeemOtp $otp
     * @param $recipient
     */
    public function requestPin(BeemOtp $otp, $recipient)
    {
        $client = new Client;

        try {
            if ($otp->appId && $otp->apiKey && $otp->secretKey) {
                $response = $client->post($this->pinRequestUrl, [
                    'auth' => [$otp->apiKey, $otp->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'appId' => $otp->appId,
                        'msisdn' => $recipient,
                    ],
                ]);
            } else {
                $response = $client->post($this->pinRequestUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'appId' => $this->appId,
                        'msisdn' => $recipient,
                    ],
                ]);
            }
        } catch (ConnectException $e) {

        }
        return $response;
    }

    /**
     * Verify PIN using Beem.
     *
     * @param BeemOtp $otp
     * @param $pinId
     * @param $pin
     */
    public function verifyPin(BeemOtp $otp, $pinId, $pin)
    {
        $client = new Client;

        try {
            if ($otp->apiKey && $otp->secretKey) {
                $response = $client->post($this->verificationUrl, [
                    'auth' => [$otp->apiKey, $otp->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'pinId' => $pinId,
                        'pin' => $pin,
                    ],
                ]);
            } else {
                $response = $client->post($this->verificationUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'pinId' => $pinId,
                        'pin' => $pin,
                    ],
                ]);
            }
        } catch (ConnectException $e) {

        }
        return $response;
    }
}
