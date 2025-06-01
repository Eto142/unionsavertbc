<?php

namespace App\Listeners;

use App\Mail\welcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        Mail::to($event->user->email)->send(new welcomeEmail($event->user->data));
    }
}
