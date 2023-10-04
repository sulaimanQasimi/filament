<?php

namespace App\Observers;

use App\Mail\StudentMessageMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        Mail::to(config('app.admin_email'))->queue(new StudentMessageMail($student,'create'));
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {

        Mail::to(config('app.admin_email'))->queue(new StudentMessageMail($student,'update'));
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        Mail::to(config('app.admin_email'))->queue(new StudentMessageMail($student,'delete'));
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {

        Mail::to(config('app.admin_email'))->queue(new StudentMessageMail($student,'restore'));
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
