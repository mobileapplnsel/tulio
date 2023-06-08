@component('mail::message')
# Greetings from Tulio!

Received an Enquiry From Tulio Website:
<br>
<br>
<b>
Name: {{$name}}<br>
Email: {{$email}}<br>
Phone: {{$phone}}<br>
</b>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
