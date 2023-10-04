<x-mail::message>
@lang('Name')- {{$user->name}} || @lang('Email') {{$user->email}}
{{now()}}
داخل سیستم شد

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
