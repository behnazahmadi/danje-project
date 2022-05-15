
<!-- Start Footer Area -->
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
                        <li><a href="{{route('about-us')}}">درباره ما</a></li>
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
                        <li><a href="{{route('contact-us')}}">تماس با ما</a></li>
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
<!-- End Footer Area -->

<div class="go-top"><i class="fas fa-arrow-up"></i></div>


<script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
<script src="{{asset('assets/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />

</body>
</html>
