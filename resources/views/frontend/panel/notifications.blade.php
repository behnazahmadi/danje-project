@extends("frontend.layouts-panel.app")

@section("breadcrumb")
اعلانات
@endsection

@section("content")
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold">اعلانات</h2>
                </div>
                    <hr>
                <div class="card-title align-items-center">
                    <a class="btn btn-warning" href="{{route('panel.notifications')}}">اعلانات خوانده نشده</a>
                    <a class="btn btn-primary text-white" href="{{route('panel.notifications',['filter'=>"read"])}}">اعلانات خوانده شده</a>
                    <a href=""></a>
                    <div class="notifications">
                       @foreach($notifications as $notification)
                        <div class="notification_item mt-4">
                            <a class="text-dark font-weight-bold">{!! $notification->data['message'] !!} - <a
                                    class="badge badge-danger text-white" href="{{url($notification->data['link'])}}">مشاهده پاسخ</a></a> </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
