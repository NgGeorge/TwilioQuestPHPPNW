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
}
