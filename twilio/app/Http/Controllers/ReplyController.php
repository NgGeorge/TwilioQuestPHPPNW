<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Twiml;

class ReplyController extends Controller
{
    // Twilio quest is gave me an error here, I think it was
    // looking specifically for the the Twiml object rather than
    // only a successful repsonse.
    //
    // This method creates a TwiML object that is sent as a reply with the state of
    // sender's phone number.
    public function reply(Request $request) {
      $response = new Twiml;
      $number = $_REQUEST['From'];
      $state = $_REQUEST['FromState'];
      $response->message('Hi! It looks like your phone number was born in {{ '.$state.' }}');
      print $response;
    }

 
    // This was what I originally wrote, based on TwiML's SDK doc and does work but doesn't get verified
    // for the challenge.
    //
    // This is a message reply with the state of the sender's phone number.
    public function replyOriginal(Request $request) {
      $sid = 'ACc6998e678f0386f3375ae7ce6a9b064b';
      $token = 'c19cb8d959855d6832e856ae08e6bd93';
      $client = new Client($sid, $token);

      $number = $request->input('From');
      $state = $request->input('FromState');

      $client->messages->create(
        $number,
        array(
          'from' => '+14252306236',
          'body' => 'Hi! It looks like your phone number was born in {{ '.$state.' }}',
        )
      );
    }
}
