@component('mail::message')
# Greetings from Tulio!

The project board has been updated by {{$shared_name}}. <br>
Please log in to the portal to review and proceed. 
<br>

@isset($additional_message)
Additional Message from {{$shared_name}}:<br>
{{$additional_message}}
@endisset

@component('mail::button', ['url' => \URL::route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
