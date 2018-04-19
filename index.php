<?php

require_once './vendor/autoload.php';

use Twilio\Twiml;
$response = new Twiml();
$response->say('Thanks for calling Rearward Reality. Lets Fight Back.', ['voice' => 'woman', 'language' => 'en']);
$response->say('In case of emergency Dial one zero zero.', ['voice' => 'woman', 'language' => 'en']);

$response->redirect('control.php', ['method' => 'POST']);



// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
?>
