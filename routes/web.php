<?php

use App\Imports\StudentImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('import',function () {

    Excel::import(new StudentImport, resource_path('student.xlsx'));

});
