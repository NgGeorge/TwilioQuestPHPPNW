<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SendController extends Controller
{

    // send sends a text message with the date 
    public function send() {
      $client = new Client(env('SID'), env('TOKEN'));
      $date = date('dmy'); 

      $client->messages->create(
        '+12092104311',
        array(
          'from' => '+14252306236',
          'body' => 'Greetings! The current time is: '.$date.' URIZDZ4ISST3Y1V',
        )
      );
    }

    // sendPerson sends a text message with information about my favorite historical figure
    public function sendPerson() {
      $client = new Client(env('SID'), env('TOKEN'));
      
      $client->messages->create(
        '+12092104311',
        array(
          'from' => '+14252306236',
          'body' => 'Did you know my favorite historical figure, Bob, died 22 years ago? URIZDZ4ISST3Y1V',
          'mediaUrl' => 'https://lh4.googleusercontent.com/-WUfsBCoMOpk/AAAAAAAAAAI/AAAAAAAAD24/8PYuu31OZ9k/photo.jpg',
        )
      );
    }

    // send sends a message through the Message Service with Copilot
    public function sendCopilot() {
      $client = new Client(env('SID'), env('TOKEN'));

      $client->messages->create(
        '+16268186733',
        array(
          'messagingServiceSid' => 'MGf440d12834ef1b336b3e670f4114dfa1',
          'body' => 'This is a test message sent via Copilot',
          'statusCallback' => "http://3f9f2145.ngrok.io/status",
        )
      );
    }

    public function send20() {
       $client = new Client(env('SID'), env('TOKEN'));

       // Because I'm lazy, for this challenge I'll just make 2 loops
       for ($i = 0; $i < 10; $i++) {
         $rand = rand(1, 1000);
         $client->messages->create(
          '+16264003807',
          array(
            'messagingServiceSid' => 'MGf440d12834ef1b336b3e670f4114dfa1',
            'body' => 'I am the spam master :poop: '.$rand,
            'statusCallback' => "http://3f9f2145.ngrok.io/status",
          )
        );
       }

       for ($j = 0; $j < 10; $j++) {
         $rand = rand(1, 1000);
         $client->messages->create(
          '+16268186733',
          array(
            'messagingServiceSid' => 'MGf440d12834ef1b336b3e670f4114dfa1',
            'body' => 'Hi George, I am the spam master '.$rand,
            'statusCallback' => "http://3f9f2145.ngrok.io/status",
          )
        );
       }

    }
}
