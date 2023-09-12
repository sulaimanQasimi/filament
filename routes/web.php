<?php

use App\Http\Controllers\ImportController;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
Route::middleware('auth')->controller(ImportController::class)->group(function(){
Route::get('import','create')->name('import.create');
Route::post('import','store')->name('import.store');
});
