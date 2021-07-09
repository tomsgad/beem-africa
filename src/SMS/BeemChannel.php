<?php

namespace Tomsgad\Beem\SMS;

use Illuminate\Notifications\Notification;
use Tomsgad\Beem\Exceptions\SMS\InvalidConfiguration;

class BeemChannel
{
    public $beem;

    /**
     * Beem  Channel Constructor.
     *
     * @param Beem $beem
     */
    public function __construct(Beem $beem)
    {
        $this->beem = $beem;
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
        $message = $notification->toBeem($notifiable);
        $recipients = $this->getRecipients($notifiable);

        try {
            $response = $this->beem->sendMessage($message, $recipients);

            return $response;
        } catch (Exception $e) {
        }
    }

    /**
     * Check Balance.
     *
     * @param BeemSms $sms
     *
     * @throws Exception
     *
     * @return array|null
     */
    public function checkBalance($sms)
    {
        try {
            $response = $this->beem->checkBalance($sms);

            return $response;
        } catch (Exception $error) {
            return $error;
        }
    }

    /**
     * Get recipient phone number(s).
     *
     * @param $notifiable
     * @return mixed
     * @throws InvalidConfiguration
     */
    public function getRecipients($notifiable)
    {
        if ($notifiable->routeNotificationFor('beem')) {
            $arrayContacts = [];
            $phoneNumbers = $notifiable->routeNotificationFor('beem');

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
