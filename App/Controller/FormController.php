<?php

namespace App\Controller;

use App\Models\FormModel;
use App\Models\EmailSender;
use App\Models\SmsSender;


class FormController
{
    private $model;
    private $id;
    private $emailSender;
    private $smsSender;

    private $emailApiKey = '12345abcd12345abcd12345abcd12345abcd';
    private $smsApiKey = '67890efghi67890efghi67890efghi67890efghi';

    public function __construct()
    {
        $this->model = new FormModel();
        $this->emailSender = new EmailSender($this->emailApiKey);
        $this->smsSender = new SmsSender($this->smsApiKey);
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['textarea'];

            if (!empty($_POST['csrf_token']) && hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
                $this->id = $this->model->saveData($data);
                $this->sendDataToEmail($data);
                $this->sendDataToSms($data);
            } else {
                throw new \Exception('CSRF Token validation error');
            }
        }
    }

    public function getData()
    {
        return $this->model->getData($this->id);
    }

    public function getCSRFToken()
    {
        return $this->model->generateCSRFToken();
    }

    private function sendDataToEmail($data)
    {
        $this->emailSender->send($data);
    }

    private function sendDataToSms($data)
    {
        $this->smsSender->send($data);
    }
}