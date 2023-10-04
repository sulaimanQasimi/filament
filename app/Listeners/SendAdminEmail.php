<?php

namespace App\Listeners;

use App\Events\UserLoginEvent;
use App\Mail\UserLoginEmail;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminEmail
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
    public function handle(Login $event): void
    {
        Mail::to(config('app.admin_email'))->queue(new UserLoginEmail($event->user));
    }
}
