<?php

use App\Http\Controllers\ImportController;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('im0port',function () {
    //  (new StudentImport)->import( resource_path('test.html'), null, \Maatwebsite\Excel\Excel::HTML);
  Excel::import(new StudentImport, resource_path('student.xlsx'));
});
Route::middleware('auth')->controller(ImportController::class)->group(function(){
Route::get('import','create')->name('import.create');
Route::post('import','store')->name('import.store');
});
