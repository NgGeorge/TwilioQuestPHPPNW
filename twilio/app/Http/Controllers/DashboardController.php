<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function home() {

    $client = new Client(env('SID'), env('TOKEN'));
    return view('dashboard', ['sent' => $sent, 'received' => $received, 'charges' => $charges]);
  }
}
