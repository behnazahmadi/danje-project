<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قالب Nextable - قالب مدیریتی نکستیبل</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/media/image/favicon.png')}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('admin/vendors/bundle.css')}}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('admin/vendors/datepicker/daterangepicker.css')}}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{asset('admin/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/slick/slick-theme.css')}}">

    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('admin/vendors/vmap/jqvmap.min.css')}}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}" type="text/css">
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>

</head>

<body>

<!-- begin::page loader-->
{{--<div class="page-loader">--}}
{{--    <div class="spinner-border"></div>--}}
{{--</div>--}}
<!-- end::page loader -->

<!-- begin::sidebar user profile -->
<div class="sidebar" id="userProfile">
    <div class="text-center p-4">
        <figure class="avatar avatar-state-success avatar-lg mb-4">
            <img src="{{asset('assets/users/'.auth()->user()->profile_image)}}" class="rounded-circle" alt="image">
        </figure>
        <h4 class="text-primary m-b-10">{{auth()->user()->name}}</h4>
        <p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
            رهبر تیم <a href="#" class="ml-2" data-toggle="tooltip" title="تنظیمات" data-sidebar-open="#settings"> <i class="ti-settings"></i> </a>
        </p>
    </div>
    <hr class="m-0">
    <div class="p-4">
        <div class="mb-4">
            <h6 class="font-size-13 mb-3">
                تکمیل پروفایل
                <span class="float-right primary-font">%25</span>
            </h6>
            <div class="progress m-b-20" style="height: 5px;">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3">
                ذخیره سازی
                <span class="float-right primary-font">%77</span>
            </h6>
            <div class="progress m-b-20" style="height: 5px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3 ">
                وظایف انجام شده
                <span class="float-right primary-font">%40</span>
            </h6>
            <div class="progress m-b-20" style="height: 5px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3 pt-2">درباره</h6>
            <p class="text-muted">{{auth()->user()->about_me}}</p>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3">شهر</h6>
            <p class="text-muted">تبریز / ایران</p>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3">شبکه های اجتماعی</h6>
            <ul class="list-inline mb-4">
                <li class="list-inline-item">
                    <a href="#" class="btn btn-sm btn-floating btn-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-sm btn-floating btn-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-sm btn-floating btn-dribbble">
                        <i class="fa fa-dribbble"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-sm btn-floating btn-whatsapp">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-sm btn-floating btn-linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-4">
            <h6 class="font-size-13 mb-3">تنظیمات</h6>
            <div class="form-group">
                <div class="form-item custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch11">
                    <label class="custom-control-label" for="customSwitch11">مسدود کردن</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-item custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="customSwitch12">
                    <label class="custom-control-label" for="customSwitch12">بیصدا کردن</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end::sidebar user profile -->

<!-- begin::sidebar settings -->
<div class="sidebar" id="settings">
    <header>
        <i class="ti-settings"></i> تنظیمات
    </header>
    <div class="p-4">
        <div class="mb-3">
            <h6 class="font-size-13 mb-3 text-muted">سیستم</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>به روز رسانی خودکار</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>وضعیت کنونی</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>پیشنهادات کاربران</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                        <label class="custom-control-label" for="customSwitch3"></label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-3">
            <h6 class="font-size-13 mb-3 text-muted">حساب کاربری</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>امنیت حساب کاربری ارشد</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4">
                        <label class="custom-control-label" for="customSwitch4"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>حفاظت حساب کاربری</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch5" checked>
                        <label class="custom-control-label" for="customSwitch5"></label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-3">
            <h6 class="font-size-13 mb-3 text-muted">اعلان ها</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>اعلان های مرورگر</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch6">
                        <label class="custom-control-label" for="customSwitch6"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>اعلان های موبایل</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch7">
                        <label class="custom-control-label" for="customSwitch7"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>اشتراک ایمیل</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch8">
                        <label class="custom-control-label" for="customSwitch8"></label>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
                    <span>اعلان های sms</span>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch9" checked>
                        <label class="custom-control-label" for="customSwitch9"></label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end::sidebar settings -->

<!-- begin::navigation -->
@include("admin.layouts.navigation")
<!-- end::navigation -->

<!-- begin::header -->
@include("admin.layouts.header")
<!-- end::header -->

<!-- begin::main content -->
@yield("content")
<!-- end::main content -->

@yield("script")
@include("admin.layouts.footer")
