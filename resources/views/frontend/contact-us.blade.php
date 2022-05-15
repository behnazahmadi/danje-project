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

    @livewireStyles

</head>

<!-- Preloader -->
{{--<div class="preloader">--}}
{{--    <div class="loader">--}}
{{--        <div class="shadow"></div>--}}
{{--        <div class="box"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Preloader -->

<!-- Start Navbar Area -->
@include("layouts.header")
<!-- End Navbar Area -->

<!-- Start Page Title Area -->
<div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>تماس با ما</h2>
            <p>اگر ایده ای دارید ، دوست داریم در مورد آن بشنویم.</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="contact-area ptb-70">
    <div class="container">
        <div class="section-title">
            <h2>برای هرگونه سوال در مورد ما پیام بگذارید</h2>
            <div class="bar"></div>
            <p>یک واقعیت طولانی مدت این است که محتوای قابل خواندن یک صفحه باعث می شود خواننده از تمرکز بر طرح کلی متن یا فرم پاراگراف های قرار داده شده در صفحه مورد نظر خود منحرف شود.</p>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="contact-info">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>آدرس شخص</span>
                            کشور شما, استان و شهر شما, محله شما
                        </li>

                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span>پست الکترونیک</span>
                            <a href="#">Yoursite@site.com</a>
                            <a href="#">Yoursite@site.com</a>
                        </li>

                        <li>
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <span>تلفن</span>
                            <a href="#">+44 587 154756</a>
                            <a href="#">+55 5555 14574</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
            @livewire("contact-us")
            </div>

        </div>
    </div>

    <div class="bg-map"><img src="assets/img/bg-map.png" alt="image"></div>
</section>
<!-- End Contact Area -->

@guest
    <!-- Start Account Create Area -->
    <section class="account-create-area">
        <div class="container">
            <div class="account-create-content">
                <h2>در عرض چند دقیقه برای حساب کاربری خود اقدام کنید</h2>
                <p>اکنون حساب کاربری خود را ایجاد کنید!</p>
                <a href="{{url("register")}}" class="btn btn-primary">ایجاد حساب کاربری</a>
            </div>
        </div>
    </section>
    <!-- End Account Create Area -->
@endguest

@include("layouts.footer")
