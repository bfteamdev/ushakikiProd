<?php

namespace App\Listeners;

use App\Mail\ClientRegistedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ClientRegistedListener implements ShouldQueue
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
    public function handle($event)
    {
        // Mail::to("admin@gmail.com")->send(new ClientRegistedMail($event->user));
        Mail::to($event->user->email)->send(new ClientRegistedMail($event->user));
    }
}
