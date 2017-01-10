<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\NexmoMessage as NexmoMessage;
class NexmoController extends Controller
{
    public function toNexmo($notifiable)
{
    return (new NexmoMessage)
                ->content('Your SMS message content');
}
}
