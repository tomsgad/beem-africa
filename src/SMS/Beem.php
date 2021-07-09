<?php

namespace Tomsgad\Beem\SMS;

use GuzzleHttp\Client;

class Beem
{
    protected $apiUrl = 'https://apisms.beem.africa/v1/send';

    protected $checkBalanceUrl = 'https://apisms.beem.africa/public/v1/vendors/balance';

    protected $apiKey;

    protected $secretKey;

    protected $senderName;

    /**
     * Beem Africa Constructor.
     *
     * @param $config
     */
    public function __construct(array $config)
    {
        $this->apiKey = $config['sms_api_key'];
        $this->secretKey = $config['sms_secret_key'];
        $this->senderName = $config['sms_sender_name'];
    }

    /**
     * Send sms message to recipient using Beem Africa.
     *
     * @param BeemSms $sms
     * @param $recipients
     */
    public function sendMessage(BeemSms $sms, $recipients)
    {
        $client = new Client;

        try {
            if ($sms->sender && $sms->apiKey && $sms->secretKey) {
                $response = $client->post($this->apiUrl, [
                    'auth' => [$sms->apiKey, $sms->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'source_addr' => $sms->sender,
                        'message' => $sms->content,
                        'encoding' => 0,
                        'recipients' => $recipients,
                    ],
                ]);
            } else {
                $response = $client->post($this->apiUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'source_addr' => $this->senderName,
                        'message' => $sms->content,
                        'encoding' => 0,
                        'recipients' => $recipients,
                    ],
                ]);
            }
        } catch (ConnectException $error) {
        	return $error;
        }

        return $response->getBody()->getContents();
    }

    /**
     * Check Beem Balance
     *
     * @param BeemSms $sms
     */
    public function checkBalance(BeemSms $sms)
    {
        $client = new Client;

        try {
            if ($sms->apiKey && $sms->secretKey) {
                $response = $client->post($this->checkBalanceUrl, [
                    'auth' => [$sms->apiKey, $sms->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                ]);
            } else {
                $response = $client->post($this->checkBalanceUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                ]);
            }
        } catch (ConnectException $error) {
            return $error;
        }

        return $response->getBody()->getContents();
    }
}
