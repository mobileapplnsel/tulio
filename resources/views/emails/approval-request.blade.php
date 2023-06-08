@component('mail::message')
# Greetings from Tulio!

A New user has registered for an A+ID Account <br>

Please review the profile and approve the account in admin panel.<br>

<b>Name:</b> {{$name}} {{$lastname}}<br>
<b>User Type:</b> {{$type}}<br>
<b>Company / Studio Name:</b> {{$company}}<br>
<b>Email:</b> {{$email}}<br>
<b>Phone:</b> {{$phone}}<br>

@component('mail::button', ['url' => \URL::route('admin.login')])
Admin Login
@endcomponent


Regards,<br>
{{ config('app.name') }}
@endcomponent
