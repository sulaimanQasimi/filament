<?php

namespace App\Support;

use App\Mail\StudentPrintInfoMail;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use TCPDF_FONTS;
use PDF;

class StudentInfoASPDF
{
    public static function generate(Student $student)
    {
        TCPDF_FONTS::addTTFfont(resource_path('font/arial.ttf'));
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::setCellPadding(0, 0, 0, 0);
        PDF::setRTL(true);
        PDF::SetFont('arial');
        PDF::WriteHTML(view()->make('welcome', ['student' => $student])->render());
        $path =  storage_path(time() . '.pdf');
        PDF::Output($path, 'f');
        return $path;
    }
}
