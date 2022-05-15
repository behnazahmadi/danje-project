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

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

        <!-- Preloader -->
{{--        <div class="preloader">--}}
{{--            <div class="loader">--}}
{{--                <div class="shadow"></div>--}}
{{--                <div class="box"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- End Preloader -->

        <!-- Start Login Area -->
        <section class="login-area">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        <img src="assets/img/login-bg.jpg" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href="{{url("/")}}"><img src="assets/img/black-logo.png" alt="image"></a>
                                    </div>

                                    <h3>خوش آمدید</h3>
                                    <p>کاربر جدید هستید؟ <a href="{{route("register")}}">اکنون یک حساب کاربری باز کنید</a></p>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="{{__('آدرس ایمیل شما')}}" class="form-control">
                                            @error("email")
                                            <p class="text text-danger pt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="{{__('رمز ورود خود را وارد کنید')}}" class="form-control">
                                            @error("password")
                                            <p class="text text-danger pt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LfcOlkbAAAAAKINgRgp5t2Th-Jb3j6xZABDQmSh"></div>
                                            @error('g-recaptcha-response')
                                            <span class="text-danger small">{{$message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="remember_me" class="d-flex justify-content-start items-center">
                                                <input type="checkbox" id="remember_me" style="margin:14px"  name="remember" />
                                                <p class="ml-2 text-sm text-gray-600 mr-1" style="margin-right:-7px;margin-top:7px">{{ __('منو به خاطر بسپار') }}</p>
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary">وارد شوید</button>

                                        @if (\Route::has('password.request'))
                                        <div class="forgot-password">
                                            <a href="{{ route('password.request') }}">رمز ورود خود را فراموش کرده اید؟</a>
                                        </div>
                                        @endif

                                        <div class="google connect-with-social">
                                            <a href="{{route("login.google.redirect")}}" class="google btn btn-outline-danger"><i class="fab fa-google"></i>{{" با Google ارتباط برقرار کنید"}}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <br>
    <br>
    <br>
    <br>
        <!-- End Login Area -->


@include("layouts.footer")
