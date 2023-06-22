<?php

namespace App\Models;

// TODO: add abstract layer for dependency inversion (sender interface)
class EmailSender
{
    private $emailApiKey;

    public function __construct($emailApiKey)
    {
        $this->emailApiKey = $emailApiKey;
    }

    public function send($data)
    {
        echo "Email sent with data: $data\n";
    }
}