@component('mail::message')
# {{$data["subject"]}}

{{$data["message"]}}

@component('mail::button', ['url' => '/'])
برگشت به وبسایت
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
