@component('mail::message')
# Greetings from Tulio!

Hi,<br>
You can now access the Tulio Architects + Interior Designers portal. <br>
<br>
Your relationship manager is: <b>{{$assigned_name}}</b>

<br>Looking forward to working with you!<br>



@component('mail::button', ['url' => \URL::route('login')])
Login
@endcomponent


Regards,<br>
{{ config('app.name') }}
@endcomponent
