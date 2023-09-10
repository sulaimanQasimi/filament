<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow,WithChunkReading
{

    public function model(array $row)
    {
     $student=   new Student([
            'department_id'=>1,
            'id_card' => $row['id_card'],
            'name' => $row['name'],
            'last_name' => $row['last_name'],
            'father_name' => $row['father_name'],
            'grand_father_name' => $row['grand_father_name'],
            'dob' => $row['dob'],
            'pob' => $row['pob'],
            'name_en' => $row['name_en'],
            'last_name_en' => $row['last_name_en'],
            'father_name_en' => $row['father_name_en'],
            'grand_father_name_en' => $row['grand_father_name_en'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'konkor_year' => $row['konkor_year'],
            'enter_year' => $row['enter_year'],
            'break_year' => $row['break_year'],
            'drop_year' => $row['drop_year'],
            'fail_year' => $row['fail_year'],
            'degree' => $row['degree'],
            'konkor_id' => $row['konkor_id'],
            'konkor_score' => $row['konkor_score'],
            'school_name' => $row['school_name'],
            'school_graduation_year' => $row['school_graduation_year'],
            'research_title' => $row['research_title'],
            'research_teacher' => $row['research_teacher'],
            'research_defendent_year' => $row['research_defendent_year'],

        ]);

        for($i=1;$i<=8;$i++){
            for($j=1;$j<=10;$j){


            }
        }
        dd($row);
        die;
        return $student;
    }
    public function headingRow(): int
    {
        return 3;
    }
    public function chunkSize() : int {
        return 10;

    }
}
