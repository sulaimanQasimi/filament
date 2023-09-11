<?php

namespace App\Nova;

use App\Nova\Filters\SemesterFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Score extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Score>
     */
    public static $model = \App\Models\Score::class;

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
    public static function singularLabel()
    {
        return __('Score');
    }
    public static function label()
    {
        return __('Scores');
    }

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
            BelongsTo::make(__('Student'),'student',Student::class),
         Text::make(__('Semister'),'semister')->nullable(),
         Text::make(__('Subject'),'subject')->nullable(),
         Number::make(__('Credit'),'credit')->nullable(),
           Number::make(__('Chance 1'),'chance_1')->nullable(),
           Number::make(__('Chance 2'),'chance_2')->nullable(),
           Number::make(__('Chance 3'),'chance_3')->nullable(),
           Number::make(__('Chance 4'),'chance_4')->nullable(),
           Number::make(__('Chance 5'),'chance_5')->nullable(),
           Number::make(__('Total'),'total')->nullable(),
         Text::make(__('Group'),'group')->nullable(),
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
        return [new SemesterFilter];
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
