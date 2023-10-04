<?php

namespace App\Listeners;

use App\Events\CreateStudentEvent;
use App\Mail\StudentMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendStudentInfoASPDFCreateion
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
    public function handle(CreateStudentEvent $event): void
    {

    Mail::to(config('app.admin_email'))
        ->bcc(auth()->user()->email)
        ->queue(new StudentMessageMail($event->student,'create'));
    }
}
