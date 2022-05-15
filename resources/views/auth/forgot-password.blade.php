<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,Multipurpose,Online Banking,Payment Processing,Luvion - Online Banking & Payment Processing HTML Template" >
    <meta name="description" content="Luvion - Online Banking & Payment Processing HTML Template">
    <meta name="author" content="Barat Hadian">
    @include("layouts.header_link")
    <title>Luvion - قالب HTML لوویون , پوسته چندمنظوره شرکتی بانکداری آنلاین و پردازش پرداخت</title>

    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
</head>

<!-- Preloader -->
{{--<div class="preloader">--}}
{{--    <div class="loader">--}}
{{--        <div class="shadow"></div>--}}
{{--        <div class="box"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Preloader -->

<!-- Start Login Area -->
<section class="login-area">
    <div class="row m-0">
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-image">
                <img src="{{asset('assets/img/login-bg.jpg')}}" alt="image">
            </div>
        </div>

        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
                            <div class="logo">
                                <a href="{{url("/")}}"><img src="{{asset('assets/img/black-logo.png')}}" alt="image"></a>
                            </div>

                            <h3>فراموشی رمز عبور</h3>
                            <p>ایمیل خود را برای بازیابی رمز عبور وارد کنید</p>

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email" value="{{old('email')}}" required autofocus placeholder="{{__('آدرس ایمیل شما')}}" class="form-control">
                                    @error("email")
                                    <p class="text text-danger pt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">دریافت ایمیل بازیابی</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

@include("layouts.footer")

{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
