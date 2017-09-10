<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    public function reply() {
      $response = new Twiml;
      $state = $_REQUEST['FromState'];
      $response->message('Hi! It looks like your phone number was born in {{ '.$state.' }}');
      print $response;
    }

 
    // This was what I originally wrote, based on TwiML's SDK doc and does work but doesn't get verified
    // for the challenge.
    //
    // This is a message reply with the state of the sender's phone number.
    public function replyOriginal(Request $request) {
      $client = new Client(env('SID'), env('TOKEN'));

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


    // This method sends a reminder based on the given time and keyword
    // This also doesn't get verified for the challenge, but it works
    public function reminder() {
      $response = new Twiml;
      $reminder = explode(' ', $_REQUEST['Body']);
      $response->message("Hey! You told me to remind you about '".$reminder[0]."'");
      sleep((int)$reminder[1]);
      print $response;
    }


    // This method also sends a reminder based on the given time and keyword
    // This Does get verified for the challenge, but I don't know why. It's 
    // the opposite of the previous challenge's verification bug.
    public function reminder2(Request $request) {
      $client = new Client(env('SID'), env('TOKEN'));
      $reminder = explode(' ', $request->input('Body'));

      $number = $request->input('From');

      sleep((int)$reminder[1]);

      for ($i = 0; $i < 6; $i++ ) {

        $rand = rand(1, 1000);

        $client->messages->create(
            $number,
            array(
              'from' => '+18443344587',
              'body' => "Hey! You told me to remind you about '".$reminder[0]."' ".$rand,
              'statusCallback' => "http://3f9f2145.ngrok.io/status",
            )
        );
      }
    }


    // Log message status
    public function statusCheck(Request $request) {
      $status = $request->input('MessageStatus');
      $messageSid = $request->input('MessageSid');
      $twilioSignature = $request->header('X-Twilio-Signature');
      Log::info($status.' zzz '.$messageSid.' zzz '.$twilioSignature);
    }
}
