<?php

namespace Tomsgad\BeemAfrica\SMS;

class BeemAfricaMessage
{
    public $content = '';

    public $sender = '';

    public $apiKey = '';

    public $secretKey = '';

    /**
     * Create a new message instance.
     *
     * @param  string $content
     *
     * @return static
     */
    public static function create($content = '')
    {
        return new static($content);
    }

    /**
     * Beem Africa Message constructor.
     *
     * @param string $content
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * @param $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the phone number  or sender name this message is sent from.
     *
     * @param $sender
     * @return $this
     */
    public function sender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the phone number or sender name this message is sent from.
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the apiKey for authentication.
     *
     * @param $sender
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
