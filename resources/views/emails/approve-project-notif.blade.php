@component('mail::message')
# Greetings from Tulio!

{{$shared_name}} has approved the project board.<br>
Please proceed by confirming the order on the portal enabling your assigned relationship manager to process this project further.  
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
