@extends("frontend.layouts-panel.app")

@section("breadcrumb")
   اطلاعات حساب کاربری
@endsection

@section("content")
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold">اطلاعات حساب کاربری</h2>
                </div>
                    <hr>
                <div class="card-title align-items-center">
                    <div>
                        <p>نام و نام خانوادگی یا نام کاربری : {{auth()->user()->name}}</p>
                    </div>
                    <div>
                        <p>شماره تماس : {{auth()->user()->phone ?? "ثبت نشده"}}</p>
                    </div>
                    <div>
                        <p>ایمیل : {{auth()->user()->email}}</p>
                    </div>
                    <div>
                        <p> بیوگرافی  : {{auth()->user()->about_me}}</p>
                    </div>
                    <div>
                        <p> تاریخ ورود : {{\Morilog\Jalali\Jalalian::forge(auth()->user()->created_at)->ago()}}</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
