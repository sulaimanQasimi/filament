<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Notifications\NovaNotification;
use TCPDF_FONTS;
use  PDF;

class PDFStudentInfo extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function title() {
return __("PDF Info");
    }
    public function handle(ActionFields $fields, Collection $models)
    {
            TCPDF_FONTS::addTTFfont(resource_path('font/arial.ttf'));
            PDF::SetTitle('Hello World');
        foreach($models as $model){
            PDF::AddPage();
            PDF::setCellPadding(0,0,0,0);
            PDF::setRTL(true);
            PDF::SetFont('arial');
            PDF::WriteHTML(view()->make('welcome', ['student' => $model])->render());


        }
        $file=time().'.pdf';
        $path=  public_path($file);

       PDF::Output($path,'f');
       request()->user()->notify(
        NovaNotification::make()
        ->message('You Have Download Info Document')
        ->type('info')
       );
       return Action::download(url:asset($file),name:'info.pdf');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
      //      Text::make(__('Name'),'name')->required()
        ];
    }
}
