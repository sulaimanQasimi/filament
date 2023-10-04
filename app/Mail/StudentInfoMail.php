<?php

namespace App\Mail;

use App\Support\StudentInfoASPDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use TCPDF_FONTS;
use PDF;

use App\Models\Student;

class StudentInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Student $student)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config(('app.admin_email')),'SQ Graduation System'),
            subject:"Student INFO"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'print.student',
        );
    }
    public function attachments(): array
    {
        return [
            Attachment::fromPath(StudentInfoASPDF::generate($this->student))
            ->as('info.pdf')
            ->withMime('application/pdf')
        ];
    }
}
