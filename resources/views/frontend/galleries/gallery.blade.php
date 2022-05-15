<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,Multipurpose,Online Banking,Payment Processing,Luvion - Online Banking & Payment Processing HTML Template" >
    <meta name="description" content="Luvion - Online Banking & Payment Processing HTML Template">
    <meta name="author" content="Barat Hadian">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}" type="text/css">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('admin/vendors/bundle.css')}}" type="text/css">

    @include("layouts.header_link")

    <title>Luvion - قالب HTML لوویون , پوسته چندمنظوره شرکتی بانکداری آنلاین و پردازش پرداخت</title>

    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

@include("layouts.header")

<!-- Start Page Title Area -->
<div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>گالری</h2>
            <p>گالری تصاویر وبسایت</p>
        </div>
    </div>
</div>

<main class="main-content" style="margin:0;margin-top: 20px">

    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                <div class="card-body">
                    <button data-toggle="modal" data-target="#compose" class="btn btn-primary btn-block mb-4">
                        <i class="fa fa-upload mr-2"></i> آپلود
                    </button>
                    <h6 class="font-size-13 mb-3 text-muted">دسته‌بندی ها</h6>
                    <div class="list-group list-group-sm list-group-flush">
                       @foreach(\App\Models\Category::where("parent_id",0)->where("type","gallery")->get() as $category)
                        <a href="{{route('galleries.index',['category'=>$category->name])}}" class="list-group-item link-1 pl-0 pr-0 d-flex justify-content-between align-items-center">
                            {{$category->name}}
                            <span class="badge badge-light badge-pill">14</span>
                        </a>
                       @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="card-columns">
                @foreach($galleries as $gallery)
                <div class="card hide-show-toggler">
                    <div class="position-absolute d-flex justify-content-between right-0 left-0 top-0 p-3">
                        <span class="badge badge-info">{{$gallery->category?->name}}</span>
                        <div class="dropdown hide-show-toggler-item">
                            <a href="#" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">اشتراک گذاری</a>
                                <a href="#" class="dropdown-item">کپی کردن</a>
                            </div>
                        </div>
                    </div>
                    <a href='{{asset("assets/galleries/$gallery->image")}}' class="image-popup-gallery-item">
                        <img src='{{asset("assets/galleries/$gallery->image")}}' class="card-img-top" alt="image">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="#"><img src="{{asset('assets/img/black-logo.png')}}" alt="logo"></a>
                        <p>یک واقعیت طولانی مدت این است که محتوای قابل خواندن یک صفحه باعث می شود خواننده از تمرکز بر طرح کلی متن یا فرم پاراگراف های قرار داده شده در صفحه مورد نظر خود منحرف شود.</p>
                    </div>

                    <ul class="social-links">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget pl-5">
                    <h3>شرکت ما</h3>

                    <ul class="list">
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">خدمات</a></li>
                        <li><a href="#">ویژگی ها</a></li>
                        <li><a href="#">قیمت ها</a></li>
                        <li><a href="#">آخرین اخبار ما</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>پشتیبانی</h3>

                    <ul class="list">
                        <li><a href="#">سوالات متداول</a></li>
                        <li><a href="#">سیاست حریم خصوصی</a></li>
                        <li><a href="#">شرایط و ضوابط</a></li>
                        <li><a href="#">شبکه های اجتماعی</a></li>
                        <li><a href="#">تماس با ما</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>راه های ارتباطی</h3>

                    <ul class="footer-contact-info">
                        <li><span>آدرس:</span> خیابان 27 ، نیویورک ، نیویورک 10002 ، ایالات متحده</li>
                        <li><span>پست الکترونیک:</span> <a href="#">YourSite@Site.Com</a></li>
                        <li><span>تلفن:</span> <a href="#">+ (321) 984 754</a></li>
                        <li><span>فکس:</span> <a href="#">+1-212-9876543</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p>کپی رایت © 1400 تمام حقوق محفوظ است. طراحی و توسعه توسط <a href="https://www.rtl-theme.com/author/barat/?aff=barat/" target="_blank">Barat Hadian</a></p>
        </div>
    </div>

    <div class="map-image"><img src="{{asset('assets/img/map.png')}}" alt="map"></div>
</footer>


<!-- end::Main -->

<!-- Plugin scripts -->
<script src="{{asset('admin/vendors/bundle.js')}}"></script>

<!-- Lightbox -->
<script src="{{asset('admin/vendors/lightbox/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('admin/assets/js/examples/lightbox.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
