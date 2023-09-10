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

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            new Panel('Info', [
                Text::make(__('ID Card'),'id_card'),
                Text::make(__('Name'),'name'),
                Text::make(__('Last Name'),'last_name'),
                Text::make(__('Father name'),'father_name'),
                Text::make(__('Grand Father Name'),'grand_father_name'),
                Text::make(__('Mother Name'),'mother_name'),
                Date::make(__('Date of Birth'),'dob'),
                Text::make(__('Place of Birth'),'pob'),
            ]),
            new Panel('Info In English', [
                Text::make(__('name in English'),'name_en'),
                Text::make(__('Last Name in English'),'last_name_en'),
                Text::make(__('Father Name in English'),'father_name_en'),
                Text::make(__('Grand Father Name in English'),'grand_father_name_en'),
            ]),
            new Panel('Info In English', [
                Text::make(__('Phone'),'phone'),
                Text::make(__('Address'),'address'),
            ]),
            new Panel('University', [
                BelongsTo::make(__('Department'), 'department', Department::class),
                Number::make(__('Konkor Year'), 'konkor_year')->nullable(),
                Number::make(__('Enter Year'), 'enter_year')->nullable(),
                Number::make(__('Break Year'), 'break_year')->nullable(),
                Number::make(__('Drop Year'), 'drop_year')->nullable(),
                Number::make(__('Fail Year'), 'fail_year')->nullable(),
                Select::make('degree')->options([
                    'bachlor' => __('Bachlor'),
                    'master' => __('Master'),
                    'doctoral' => __('Doctoral')
                ]),
            ]),

            new Panel('School/Konkor', [

                Text::make('konkor_id')->nullable(),
                Text::make('konkor_score')->nullable(),
                Text::make('school_name')->nullable(),
                Number::make('school_graduation_year')->nullable(),
            ]),
            new Panel('Research', [
                Text::make('research_title')->nullable(),
                Text::make('research_teacher')->nullable(),
                Number::make('research_defendent_year')->nullable(),
            ]),
            new Panel(
                'Contact',
                [

                    Text::make(__('Phone'), 'phone')->nullable(),
                    Text::make(__('Address'), 'address')->nullable(),
                ]
            ),
            HasMany::make(__('Scores'),'scores',Score::class),
            HasMany::make(__('Comment'),'comments',Comment::class),
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
