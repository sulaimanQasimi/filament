<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Department extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Department>
     */
    public static $model = \App\Models\Department::class;
    public static $title = 'name';
    public static $search = [
        'name','code'
    ];
    

    public static function singularLabel()
    {
        return __('Department');
    }
    public static function label()
    {
        return __('Department');
    }

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make(__("Name"), 'name'),
            Text::make(__("Code"), 'code'),
            HasMany::make(__('Student'),'students',Student::class)
        ];
    }
    public function cards(NovaRequest $request)
    {
        return [];
    }
    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [
            
            new \Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel(),

        ];
    }
}
