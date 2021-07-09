<?php

namespace Tomsgad\Beem\Airtime;

use GuzzleHttp\Client;

class Beem
{
    protected $transferUrl = 'https://apiairtime.beem.africa/v1/transfer';

    protected $apiKey;

    protected $secretKey;

    /**
     * Beem Constructor.
     *
     * @param $config
     */
    public function __construct(array $config)
    {
        $this->apiKey = $config['airtime_api_key'];
        $this->secretKey = $config['airtime_secret_key'];
    }

    /**
     * Transfer Airtime using Beem.
     *
     * @param BeemAirtime $airtime
     * @param $recipient
     */
    public function transfer(BeemAirtime $airtime, $recipient, $amount)
    {
        $client = new Client;

        try {
            if ($airtime->apiKey && $airtime->secretKey) {
                $response = $client->post($this->transferUrl, [
                    'auth' => [$airtime->apiKey, $airtime->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'dest_addr' => $recipient,
                        'amount' => $amount,
                        'reference_id' => random_int(100000, 999999),
                    ],
                ]);
            } else {
                $response = $client->post($this->transferUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'dest_addr' => $recipient,
                        'amount' => $amount,
                        'reference_id' => random_int(100000, 999999),
                    ],
                ]);
            }
        } catch (ConnectException $error) {
            return $error;
        }

        return $response->getBody()->getContents();
    }
}
