<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
{
    public function create()
    {
        return view('importStudent');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file',
            'department' => 'required|exists:departments,id'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file')->store('public');
            Excel::import(new StudentImport(department:$request->department), $request->file('csv_file'));
        }
        return redirect()->back();
    }
}
