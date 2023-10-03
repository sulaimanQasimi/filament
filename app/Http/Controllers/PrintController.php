<?php

namespace App\Http\Controllers;

use App\Mail\StudentPrintInfoMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use TCPDF_FONTS;
use PDF;

class PrintController extends Controller
{
    public function __construct()
    {
//        parent::__constract();
    }
    public function student(Student $student)
    {
                TCPDF_FONTS::addTTFfont(resource_path('font/arial.ttf'));
                PDF::SetTitle('Hello World');
                PDF::AddPage();
                PDF::setCellPadding(0,0,0,0);
                PDF::setRTL(true);
                PDF::SetFont('arial');


                PDF::WriteHTML(view()->make('welcome', ['student' => $student])->render());
           $path=  resource_path(time().'.pdf');

           PDF::Output($path,'f');

                Mail::to(config('app.admin_email'))

                ->queue(new StudentPrintInfoMail(student:$student,path:$path));
        return view('print.student', ['student' => $student]);
    }
}
