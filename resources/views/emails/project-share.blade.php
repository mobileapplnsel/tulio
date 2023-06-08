@component('mail::message')
# Greetings from Tulio!

Here is the weblink for the shortlisted products, hope you like them! Looking forward to hearing from you.

@component('mail::button', ['url' => \URL::signedRoute('project.share',['project'=>$project->id,'name'=>encrypt($name)])])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
