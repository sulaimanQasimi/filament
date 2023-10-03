<?php

namespace App\Nova;

use App\Nova\Actions\PDFStudentInfo;
use App\Nova\Actions\SendMailStudentInfo;
use App\Nova\Metrics\StudentYearPartition;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Student extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Student>
     */
    public static $model = \App\Models\Student::class;
    public static $title = 'konkor_id';

    public static $search = [
        'id',
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

    ];


    public static function singularLabel()
    {
        return __('Student');
    }
    public static function label()
    {
        return __('Students');
    }

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            new Panel(__('Info'), [
                Text::make(__('ID Card'), 'id_card')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                Text::make(__('Name'), 'name')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                Text::make(__('Last Name'), 'last_name')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                Text::make(__('Father name'), 'father_name')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                Text::make(__('Grand Father Name'), 'grand_father_name')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                //  Text::make(__('Mother Name'),'mother_name')->sortable()->required()->rules('required'),
                Text::make(__('Date of Birth'), 'dob')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
                Text::make(__('Place of Birth'), 'pob')->displayUsing(fn($value)=>$this->not_found_value($value))->sortable()->required()->rules('required'),
            ]),
            new Panel(__('Info In English'), [
                Text::make(__('Name in English'), 'name_en')->displayUsing(fn($value)=>$this->not_found_value($value))->textAlign('left'),
                Text::make(__('Last Name in English'), 'last_name_en')->displayUsing(fn($value)=>$this->not_found_value($value))->textAlign('left'),
                Text::make(__('Father Name in English'), 'father_name_en')->displayUsing(fn($value)=>$this->not_found_value($value))->textAlign('left'),
                Text::make(__('Grand Father Name in English'), 'grand_father_name_en')->displayUsing(fn($value)=>$this->not_found_value($value))->textAlign('left'),
            ]),

                new Panel(__('University'), [
                BelongsTo::make(__('Department'), 'department', Department::class)->showCreateRelationButton()->filterable(),
                Number::make(__('Konkor Year'), 'konkor_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Enter Year'), 'enter_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Break Year'), 'break_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Drop Year'), 'drop_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Fail Year'), 'fail_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Graduate Year'), 'graduate_year')->filterable()->sortable()->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Select::make(__('Degree'), 'degree')->displayUsing(fn($value)=>$this->not_found_value($value))->options([
                    'bachlor' => __('Bachlor'),
                    'master' => __('Master'),
                    'doctoral' => __('Doctoral')
                ])->filterable()->sortable(),
            ]),

            new Panel(__('School/Konkor'), [

                Text::make(__('Konkor ID'), 'konkor_id')->displayUsing(fn($value)=>$this->not_found_value($value))->textAlign('left')->nullable(),
                Text::make(__('Konkor Score'), 'konkor_score')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Text::make(__('School Name'), 'school_name')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('School Graduation Year'), 'school_graduation_year')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
            ]),
            new Panel(__('Research'), [
                Text::make(__('Research Title'), 'research_title')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Text::make(__('Research Teacher'), 'research_teacher')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                Number::make(__('Research Defendent Year'), 'research_defendent_year')->filterable()->sortable()->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
            ]),
            new Panel(
                __('Contact'),
                [
                    Text::make(__('Phone'), 'phone')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                    Text::make(__('Address'), 'address')->displayUsing(fn($value)=>$this->not_found_value($value))->nullable(),
                ]
            ), new Panel(__('Result'),
                [

                    Text::make(__('semester 1'), 'subject_total1')->onlyOnDetail(),
                    Text::make(__('semester 2'), 'subject_total2')->onlyOnDetail(),
                    Text::make(__('semester 3'), 'subject_total3')->onlyOnDetail(),
                    Text::make(__('semester 4'), 'subject_total4')->onlyOnDetail(),
                    Text::make(__('semester 5'), 'subject_total5')->onlyOnDetail(),
                    Text::make(__('semester 6'), 'subject_total6')->onlyOnDetail(),
                    Text::make(__('semester 7'), 'subject_total7')->onlyOnDetail(),
                    Text::make(__('semester 8'), 'subject_total8')->onlyOnDetail(),
                    Text::make(__('Final Result'), 'final_result')->onlyOnDetail(),
                    Text::make(__('Address'), 'address')->nullable(),
                ]
            ),Text::make(__('Print'))->displayUsing(
function () {
return "<a target='__blank' class='text-blue-500' href='". route('print.student',$this->id)."'>Print</a>";
}

            )->asHtml()->onlyOnDetail()->readonly(),

            HasMany::make(__('Scores'), 'scores', Score::class),
            HasMany::make(__('Comment'), 'comments', Comment::class),
        ];
    }
    private function not_found_value($value) :String {
        return (is_null($value))?__('Not'):$value;

    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            new StudentYearPartition,
            
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [new PDFStudentInfo,
    new SendMailStudentInfo];
    }
}
