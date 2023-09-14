<?php

namespace App\Http\Controllers;

use App\Models\Student;

class PrintController extends Controller
{
    public function __construct()
    {
//        parent::__constract();
    }
    public function student(Student $student)
    {
        return view('print.student', ['student' => $student]);
    }
}
