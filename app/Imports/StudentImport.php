<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
class StudentImport implements ToCollection, WithHeadingRow, WithChunkReading
{
public function __construct(public $department) {
    
}
    public function collection(Collection $rows)
    {
		foreach($rows as $row){
        $student = Student::create([
            'department_id' => $this->department,
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
    
      for ($i = 1; $i <= 8; $i++) {
            for ($j = 1; $j <= 10; $j++) {;
                $student->scores()->create([
                    'subject' => $row['semester_' . $i . '_subject_' . $j . '_name'],
                    'semister' => $i,
                    'chance_1' => $row['semester_' . $i . '_subject_' . $j . '_chance_1'],
                    'chance_2' => $row['semester_' . $i . '_subject_' . $j . '_chance_2'],
                    'chance_3' => $row['semester_' . $i . '_subject_' . $j . '_chance_3'],
                    'chance_4' => $row['semester_' . $i . '_subject_' . $j . '_chance_4'],
                    'chance_5' => $row['semester_' . $i . '_subject_' . $j . '_chance_5'],
                    'total' => $row['semester_' . $i . '_subject_' . $j . '_total'],
                    'group' => $row['semester_' . $i . '_subject_' . $j . '_grade'],
                ]);
            }
        }
        // dd($row);
        // die;
		}
    }
    public function headingRow(): int
    {
        return 3;
    }
    public function chunkSize(): int
    {
        return 100;
    }
}
