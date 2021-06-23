<?php

namespace Tomsgad\Beem\SMS;

use GuzzleHttp\Client;

class Beem
{
    protected $apiUrl = 'https://apisms.beem.africa/v1/send';

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
        $this->apiKey = $config['api_key'];
        $this->secretKey = $config['secret_key'];
        $this->senderName = $config['sender_name'];
    }

    /**
     * Send sms message to recipient using Beem Africa.
     *
     * @param BeemAfricaMessage $message
     * @param $recipients
     */
    public function sendMessage(BeemMessage $message, $recipients)
    {
        $client = new Client;

        try {
            if ($message->sender && $message->apiKey && $message->secretKey) {
                $response = $client->post($this->apiUrl, [
                    'auth' => [$message->apiKey, $message->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'source_addr' => $message->sender,
                        'message' => $message->content,
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
                        'message' => $message->content,
                        'encoding' => 0,
                        'recipients' => $recipients,
                    ],
                ]);
            }
        } catch (ConnectException $e) {
        }

        return $response;
    }
}
