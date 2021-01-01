@component('mail::message')
# Thanks for registering to our website

This mail is to welcome you

@component('mail::button', ['url' => ''])
welcome
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
