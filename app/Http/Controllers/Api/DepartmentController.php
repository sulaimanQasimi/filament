<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DepartmentController extends Controller
{
    public function department(Request $request) {

        return  QueryBuilder::for(Department::class)

        ->allowedFilters([
            AllowedFilter::exact('id'),

            'name',
            'code',
        ])
        ->allowedIncludes(['students'=>function ($query) {
            $query->paginate(

        $perPage = 1, $columns = ['*'], $pageName = 'users'
            );

        }])
            ->withCount('students')

            ->paginate()
            ->appends(request()->query());
    }
    public function  single(Department $department)  {

        return  QueryBuilder::for($department->students())
        ->allowedIncludes(['scores',])
        ->with('department')
        ->withCount('scores')

        ->allowedFilters([
            AllowedFilter::exact('id'),
            'id_card',
            'name',
            'last_name',
            'father_name',
            'grand_father_name',
            'dob',
            'pob',
            'name_en',
            'last_name_en',
            'father_name_en',
            'grand_father_name_en',
            'phone',
            'address',
            'konkor_year',
            'enter_year',
            'break_year',
            'drop_year',
            'fail_year',
            'degree',
            'konkor_id',
            'konkor_score',
            'school_name',
            'school_graduation_year',

            'research_title',
            'research_teacher',
            'research_defendent_year',
            'phone',
            'address',
        ])
        ->paginate()
        ->appends(request()->query());

    }
}
