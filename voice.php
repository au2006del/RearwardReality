<?php

require_once './vendor/autoload.php';

use Twilio\Twiml;

$response = new Twiml();

$response->say($_POST['SpeechResult'], ['voice' => 'woman', 'language' => 'en-US']);
if (preg_match('/mumbai/i', $_POST['SpeechResult'])) {
    $response->say('The shelter home located in mumbai is at ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('One Marine drive ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Mumbai ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Maharashtra 41109 ', ['voice' => 'woman', 'language' => 'en-US']);

    $from = $_REQUEST['From'];
    $response->sms('Address is: 1 Marine Drive, Mumbai,Maharashtra 41109 .', ['from' => '+16283003802',
        'to' => $from]);
    $response->say('Thank you for calling us. You will also receive a message after this call with the same information.Stay Safe!.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('If nothing else Hangup.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->redirect('control.php', ['method' => 'POST']);
} elseif (preg_match('/pune/i', $_POST['SpeechResult'])) {
    $response->say('The shelter home located in pune is at ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Aroma tower TWO Zero Three ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('M G Road Pune 41110 ', ['voice' => 'woman', 'language' => 'en-US']);
    $from = $_REQUEST['From'];
    $response->sms('Address is: 203 Aroma tower  M.G Road Pune.', ['from' => '+16283003802',
        'to' => $from]);
    $response->say('Thank you for calling us. You will also receive a message after this call with the same information.Stay Safe!.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('If nothing else Hangup.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->redirect('control.php', ['method' => 'POST']);
} elseif (preg_match('/indore/i', $_POST['SpeechResult'])) {
    $response->say('The shelter home located in indore is at ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Fourteen Kings Villa ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Indore ', ['voice' => 'woman', 'language' => 'en-US']);
    $from = $_REQUEST['From'];
    $response->sms('Address is: 14 Kings Villa, Indore. 41111', ['from' => '+16283003802',
        'to' => $from]);
    $response->say('Thank you for calling us. You will also receive a message after this call with the same information.Stay Safe!.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('If nothing else Hangup.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->redirect('control.php', ['method' => 'POST']);
} elseif (preg_match('/delhi/i', $_POST['SpeechResult'])) {
    $response->say('The shelter home located in Delhi is at ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('M block Queen Road ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('Delhi ', ['voice' => 'woman', 'language' => 'en-US']);
    $from = $_REQUEST['From'];
    $response->sms('Address is: M-block Queen Road Delhi.41112', ['from' => '+16283003802',
        'to' => $from]);
    $response->say('Thank you for calling us. You will also receive a message after this call with the same information.Stay Safe!.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->say('If nothing else Hangup.', ['voice' => 'woman', 'language' => 'en-US']);
    $response->redirect('control.php', ['method' => 'POST']);
} else {
    $response->say('Sorry I did not understand. Please Repeat. ', ['voice' => 'woman', 'language' => 'en-US']);
    $response->gather(['input' => 'speech', 'hints' => 'mumbai, pune,indore,hyderabad,delhi,gujrat,agra', 'speechTimeout' => 'auto', 'action' => 'voice.php']);
}

// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
?>

