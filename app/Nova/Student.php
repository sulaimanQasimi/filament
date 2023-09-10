<?php

namespace App\Nova;

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
                Text::make(__('ID Card'), 'id_card')->sortable()->required()->rules('required'),
                Text::make(__('Name'), 'name')->sortable()->required()->rules('required'),
                Text::make(__('Last Name'), 'last_name')->sortable()->required()->rules('required'),
                Text::make(__('Father name'), 'father_name')->sortable()->required()->rules('required'),
                Text::make(__('Grand Father Name'), 'grand_father_name')->sortable()->required()->rules('required'),
                //  Text::make(__('Mother Name'),'mother_name')->sortable()->required()->rules('required'),
                Date::make(__('Date of Birth'), 'dob')->sortable()->required()->rules('required'),
                Text::make(__('Place of Birth'), 'pob')->sortable()->required()->rules('required'),
            ]),
            new Panel(__('Info In English'), [
                Text::make(__('Name in English'), 'name_en')->textAlign('left'),
                Text::make(__('Last Name in English'), 'last_name_en')->textAlign('left'),
                Text::make(__('Father Name in English'), 'father_name_en')->textAlign('left'),
                Text::make(__('Grand Father Name in English'), 'grand_father_name_en')->textAlign('left'),
            ]),

            new Panel(__('University'), [
                BelongsTo::make(__('Department'), 'department', Department::class)->showCreateRelationButton()->filterable(),
                Number::make(__('Konkor Year'), 'konkor_year')->nullable(),
                Number::make(__('Enter Year'), 'enter_year')->nullable(),
                Number::make(__('Break Year'), 'break_year')->nullable(),
                Number::make(__('Drop Year'), 'drop_year')->nullable(),
                Number::make(__('Fail Year'), 'fail_year')->nullable(),
                Number::make(__('Graduate Year'), 'graduate_year')->nullable(),
                Select::make(__('Degree'),'degree')->options([
                    'bachlor' => __('Bachlor'),
                    'master' => __('Master'),
                    'doctoral' => __('Doctoral')
                ]),
            ]),

            new Panel(__('School/Konkor'), [

                Text::make(__('Konkor ID'),'konkor_id')->nullable(),
                Text::make(__('Konkor Score'),'konkor_score')->nullable(),
                Text::make(__('School Name'),'school_name')->nullable(),
                Number::make(__('School Graduation Year'),'school_graduation_year')->nullable(),
            ]),
            new Panel(__('Research'), [
                Text::make(__('Research Title'),'research_title')->nullable(),
                Text::make(__('Research Teacher'),'research_teacher')->nullable(),
                Number::make(__('Research Defendent Year'),'research_defendent_year')->nullable(),
            ]),
            new Panel(
                'Contact',
                [

                    Text::make(__('Phone'), 'phone')->nullable(),
                    Text::make(__('Address'), 'address')->nullable(),
                ]
            ),
            HasMany::make(__('Scores'), 'scores', Score::class),
            HasMany::make(__('Comment'), 'comments', Comment::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
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
        return [];
    }
}
