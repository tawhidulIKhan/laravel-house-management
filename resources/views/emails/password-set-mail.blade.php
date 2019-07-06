@component('mail::message')
# Introduction
Hi {{$user->name}},
You are now registered user.

@component('mail::button', ['url' => route('user.password', $user->token)])
Set your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
