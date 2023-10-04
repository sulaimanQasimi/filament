<x-mail::message>
# @lang('Student Print Info')


<br>
@lang("Student By Konkor ID of Info is action",['ID'=>$student->konkor_id,'action'=>__($action)])
@lang('Thanks'),<br>
{{ config('app.name') }}
</x-mail::message>
