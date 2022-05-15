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
{{--        <div class="preloader">--}}
{{--            <div class="loader">--}}
{{--                <div class="shadow"></div>--}}
{{--                <div class="box"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- End Preloader -->

        <!-- Start Signup Area -->
        <section class="signup-area">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="signup-image">
                        <img src="assets/img/signup-bg.jpg" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="signup-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="signup-form">
                                    <div class="logo">
                                        <a href="index.html"><img src="assets/img/black-logo.png" alt="image"></a>
                                    </div>

                                    <h3>{{__("ثبت نام کنید")}}</h3>
                                    <p>{{__("قبلاً ثبت نام کرده اید؟")}} <a href="{{url("login")}}">{{__("ورود")}}</a></p>

                                    <form method="POST" action="{{route("register")}}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="{{__('نام شما')}}" class="form-control">
                                            @error("name")
                                            <p class="text text-danger pt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="{{__('آدرس ایمیل شما')}}" class="form-control">
                                            @error("email")
                                            <p class="text text-danger pt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="{{__('رمز ورود ایجاد کنید')}}" class="form-control">
                                            @error("password")
                                            <p class="text text-danger pt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('تکرار رمز عبور جدید')}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LfcOlkbAAAAAKINgRgp5t2Th-Jb3j6xZABDQmSh"></div>
                                            @error('g-recaptcha-response')
                                            <span class="text-danger small">{{$message}}</span>
                                            @enderror
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="mt-4">
                                                <label for="terms">
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="terms" id="terms"/>

                                                        <div class="ml-2">
                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endif

                                        <button type="submit" class="btn btn-primary">{{__('ثبت نام')}}</button>

                                        <div class="connect-with-social">
                                            <span>یا</span>
                                            <a href="{{route("login.google.redirect")}}" class="google btn btn-outline-danger"><i class="fab fa-google"></i>{{__(" با Google ارتباط برقرار کنید")}}</a>
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
