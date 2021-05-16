<?php

namespace Tomsgad\BeemAfrica\SMS;

use Illuminate\Notifications\Notification;
use Tomsgad\BeemAfrica\Exceptions\SMS\InvalidConfiguration;
use Tomsgad\BeemAfrica\SMS\BeemAfrica;

class BeemAfricaChannel
{
    public $beemAfrica;

    /**
     * Beem Africa Channel Constructor.
     *
     * @param BeemAfrica $beemAfrica
     */
    public function __construct(BeemAfrica $beemAfrica)
    {
        $this->beemAfrica = $beemAfrica;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     *
     * @throws CouldNotSendNotification
     *
     * @return array|null
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toBeemAfrica($notifiable);
        $recipients = $this->getRecipients($notifiable);

        try {
            $response = $this->beemAfrica->sendMessage($message, $recipients);

            return $response;
        } catch (Exception $e) {
            
        }
    }

    /**
     * Get recipient phone number(s)
     *
     * @param $notifiable
     * @return mixed
     * @throws InvalidConfiguration
     */
    public function getRecipients($notifiable)
    {
        if ($notifiable->routeNotificationFor('beem-africa')) {
            $arrayContacts = [];
            $phoneNumbers = $notifiable->routeNotificationFor('beem-africa');

            for ($i = 0; $i < count($phoneNumbers); $i++) {
                array_push($arrayContacts, [
                    'recipient_id' => $i,
                    'dest_addr' => (string) $phoneNumbers[$i],
                ]);
            }

            return $arrayContacts;
        } else {
        	throw InvalidConfiguration::routeForNotificationNotSet();
        }
    }
}
