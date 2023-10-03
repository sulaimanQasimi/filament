<x-mail::message>
# @lang('Student Print Info')


<br>
@lang("Student By Konkor ID of Info is printed",['ID'=>$student->konkor_id])
@lang('Thanks'),<br>
{{ config('app.name') }}
</x-mail::message>
