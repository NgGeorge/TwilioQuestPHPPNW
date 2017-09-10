<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{


  // This function deletes the most recent message sent as a reminder
  // This failed for about an hour, but suddenly started working. 
  // I'm not sure why it finally got verified, but the only thing I did
  // was refactor the code from multiple methods into one method
  // - it was deleting before too.
  public function deleteMostRecentMessage() {
    $client = new Client(env('SID'), env('TOKEN'));
    $messages = $client->messages->read();
    $mostRecentMessage = $messages[0];
    Log::info($mostRecentMessage->sid);
    //$client->messages($mostRecentMessage->sid)->update(array("body" => ""));
    $client->messages($mostRecentMessage->sid)->delete();
  }
}
