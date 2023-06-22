<?php
session_start();
//TODO: autoloader
require_once 'App/Controller/FormController.php';
require_once 'App/Models/FormModel.php';
require_once 'App/Models/EmailSender.php';
require_once 'App/Models/SmsSender.php';

use App\Controller\FormController;

$formController = new FormController();
$formController->handleRequest();

$csrfToken = $formController->getCSRFToken();
$_SESSION['csrf_token'] = $csrfToken;

$data = $formController->getData();

require_once 'App/View/form.php';
?>
