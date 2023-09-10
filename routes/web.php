<?php

use App\Imports\StudentImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('import',function () {
    //  (new StudentImport)->import( resource_path('test.html'), null, \Maatwebsite\Excel\Excel::HTML);
  Excel::import(new StudentImport, resource_path('student.xlsx'));
});
