<?php

namespace Tomsgad\Beem\Airtime;

class BeemAirtime
{
    public $apiKey = '';

    public $secretKey = '';

    /**
     * Set the apiKey for authentication.
     *
     * @param $apiKey
     * @return $this
     */
    public function apiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get the apiKey.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set the secretKey for authentication.
     *
     * @param $sender
     * @return $this
     */
    public function secretKey($secretKey)
    {
        $this->secretKey = $secretKey;

        return $this;
    }

    /**
     * Get the secretKey.
     *
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }
}
