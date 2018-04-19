<?php

require_once './vendor/autoload.php';

use Twilio\Twiml;

$response = new Twiml();
if (array_key_exists('Digits', $_POST)) {
    switch ($_POST['Digits']) {
        case 1:
            $response->say('You selected 1.', ['voice' => 'woman', 'language' => 'en']);
            $response->say('In which city you are looking for shelter', ['voice' => 'woman', 'language' => 'en']);

            $response->gather(['input' => 'speech', 'hints' => 'mumbai, pune,indore,hyderabad,delhi,gujrat,agra', 'speechTimeout' => 'auto', 'action' => 'voice.php']);
            $response->say('Sorry I did not understand. Please Repeat. ', ['voice' => 'woman', 'language' => 'en-US']);
            $response->gather(['input' => 'speech', 'hints' => 'mumbai, pune,indore,hyderabad,delhi,gujrat,agra', 'speechTimeout' => 'auto', 'action' => 'voice.php']);

            break;
        case 2:
            $response->say('You need support. We will help!', ['voice' => 'woman', 'language' => 'en']);
            $response->play('ac.mp3', ['loop' => 1]);
            $response->say('All our representatives are currently busy with other calls. Please leave a message with your phone number.', ['voice' => 'woman', 'language' => 'en']);
            $response->say('When done with recording press pound key', ['voice' => 'woman', 'language' => 'en']);
            $response->record(['action' => 'completed.php', 'finishOnKey' => '#']);
            break;
        default:
            $response->say('Sorry, I don\'t understand that choice.');
    }
} else {

    // If no input was sent, use the <Gather> verb to collect user input
    $gather = $response->gather(array('numDigits' => 1));
    // use the <Say> verb to request input from the user
    $gather->say('Press 1 to know about the nearest shelter. Press 2 to speak to our representatives.', ['voice' => 'woman', 'language' => 'en']);
    // If the user doesn't enter input, loop
    $response->redirect('control.php');
}
// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
?>
