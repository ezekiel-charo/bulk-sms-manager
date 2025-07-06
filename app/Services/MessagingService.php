<?php

namespace App\Services;

use AfricasTalking\SDK\AfricasTalking;
use App\Models\AfricasTalkingCredentials;
use App\Models\Contact;

class MessagingService
{
    public function sendMessages(AfricasTalkingCredentials $credentials, array $recipientIds, string $message)
    {
        $username = $credentials->username;
        $apiKey = $credentials->api_key;

        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $contacts = Contact::findMany($recipientIds);

        $phoneNumbers = $contacts->pluck('phone_number')->toArray();

        $result = $sms->send([
            'message' => $message,
            'to'      => $phoneNumbers,
        ]);

        return $result;
    }
}
