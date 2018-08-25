<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	\Stripe\Stripe::setApiKey("sk_test_yQDvZHN41ftHS5nuqFGCZoXe");
	$token = $_POST['stripeToken'];

	$charge = \Stripe\Charge::create([
	    'amount' => 800,
	    'currency' => 'eur',
	    'description' => 'Example Greg charge',
	    'source' => $token,
	]);
	?> 

}