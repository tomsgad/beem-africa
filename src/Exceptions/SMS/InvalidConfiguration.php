<?php

namespace Tomsgad\Beem\Exceptions\SMS;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function routeForNotificationNotSet()
    {
        throw new Exception('In order to send notification via Beem Africa you need to add `routeNotificationForBeem` to the notifiable model.');
    }
}
