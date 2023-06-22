<?php

namespace App\Models;

// TODO: add abstract layer for dependency inversion (sender interface)
class SmsSender
{
    private $smsApiKey;

    public function __construct($smsApiKey)
    {
        $this->smsApiKey = $smsApiKey;
    }

    public function send($data)
    {
        echo "SMS sent with data: $data\n";
    }
}