<?php

namespace App\Nova\Filters;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class SemesterFilter extends Filter
{
    public $component = 'select-filter';
    public function apply(NovaRequest $request, $query, $value)
    {

        return $query->where('semister', "$value");
    }
    public function name()
    {
        return __("Semister");
    }
    public function options(NovaRequest $request)
    {
        return [
            __("semester 1") => 1,
            __("semester 2") => 2,
            __("semester 3") => 3,
            __("semester 4") => 4,
            __("semester 5") => 5,
            __("semester 6") => 6,
            __("semester 7") => 7,
            __("semester 8") => 8,
        ];
    }
}
