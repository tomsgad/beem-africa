<?php

namespace Tomsgad\Beem\OTP;

class BeemOtp
{
    public $appId = '';

    public $apiKey = '';

    public $secretKey = '';

    /**
     * Set application id for the otp request.
     *
     * @param $appId
     * @return $this
     */
    public function appId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * Get application id for the OTP request.
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

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
