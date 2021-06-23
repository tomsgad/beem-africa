<?php

namespace Tomsgad\Beem\Exceptions\SMS;

use Exception;

class CouldNotSendNotification extends Exception
{
    /**
     * @param string $error
     * @return CouldNotSendNotification
     */
    public static function serviceRespondedWithAnError(string $error): self
    {
        return new static("Beem service responded with an error: {$error}");
    }

    /**
     * @return static
     */
    public static function missingSourceAddress()
    {
        return new static('Notification was not sent. Missing `source_addr`.');
    }

    /**
     * @return static
     */
    public static function missingRecipients()
    {
        return new static('Notification was not sent. Missing `recipients` number(s).');
    }
}
