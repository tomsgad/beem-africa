<?php

namespace Tomsgad\BeemAfrica\Exceptions\SMS;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function routeForNotificationNotSet()
    {
        return new static('In order to send notification via Beem Africa you need to add `routeNotificationForBeemAfrica` to the notifiable model.');
    }
}