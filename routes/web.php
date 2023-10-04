<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\PrintController;
use App\Imports\StudentImport;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
Route::middleware('auth')->controller(ImportController::class)->group(function(){
Route::get('import','create')->name('import.create');
Route::post('import','store')->name('import.store');
});
Route::get('print/{student:id}',[PrintController::class,'student'])->name('print.student');
Route::get('kgf',function ()  {
   event(new Login('web',auth()->user(),false)); 
});