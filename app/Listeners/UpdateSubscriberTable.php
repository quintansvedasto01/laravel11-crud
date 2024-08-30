<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Models\Subscriber;


class UpdateSubscriberTable
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        Subscriber::create([
            'email' => $event->user->email
        ]);
    }
}
