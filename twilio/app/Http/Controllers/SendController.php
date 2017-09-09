<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SendController extends Controller
{

    private $sid = 'ACc6998e678f0386f3375ae7ce6a9b064b';
    
    private $token = 'c19cb8d959855d6832e856ae08e6bd93';


    // send sends a text message with the date 
    public function send() {
      $client = new Client($this->sid, $this->token);
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
      $client = new Client($this->sid, $this->token);
      
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
