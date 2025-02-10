@component('mail::message')
# Welcome to Our Platform, {{ $data['name'] }}

Thank you for registering with us! We're excited to have you on board.

If you have any questions, feel free to reach out.

@component('mail::button', ['url' => 'http://spotlight.test/'])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
