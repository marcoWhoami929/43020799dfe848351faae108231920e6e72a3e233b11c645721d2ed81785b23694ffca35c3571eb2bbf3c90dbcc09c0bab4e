<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "AC88d1c372db0f55d1df8d2dd016c2439d";
$token  = "1794e81eb8f6de4798bbc9c7f97f9d00";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+5212761011654", // to
                           array(
                               "from" => "whatsapp:+14155238886",
                               "body" => "Hola se ha recibido una nueva solicitud de recolección de un cliente verificalo en el sistema http://dkmatrizz.ddns.net"
                           )
                  );


/*
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACc746917bca5653a13403432c967a130e';
$auth_token = 'b199919e4b7b5d69ee0297f227cf5874';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+13344215096";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+522761011654',
    array(
        'from' => $twilio_number,
        'body' => 'Un cliente ha realizado una nueva solicitud.'
    )
);
*/