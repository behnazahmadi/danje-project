@component('mail::message')
# به پیام شما پاسخ داده شده است

{{$data}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
