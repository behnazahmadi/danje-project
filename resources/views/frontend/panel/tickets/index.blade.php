@extends("frontend.layouts-panel.app")

@section("breadcrumb")
    <a href="{{route('panel.tickets.index')}}">تیکت ها</a>
@endsection

@section("content")

    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <header class="ticket_header">
                    <h2 class="title_head_panel">لیست تیکت ها</h2>
                    <a href="{{route("panel.tickets.create")}}">افزودن تیکت جدید</a>
                </header>
                <div class="card-body">
                    <div class="tickets">
                        @forelse($tickets as $ticket)
                            <div class="box_ticket">
                                <div class="info_ticket">
                    <span
                        class="p-2 mr-2 ">تاریخ ثبت تیکت :  <b>{{jdate($ticket->created_at)->format('%A, %d %B %Y')}}</b></span>
                                    @if($ticket->status == 'Closed')
                                        <span class="p-2 mr-2">وضعیت : <b>بسته شده</b></span>
                                    @elseif($ticket->status == 'Answered')
                                        <span class="p-2 mr-2">وضعیت : <b>پاسخ داده شده</b></span>
                                    @else
                                        <span class="p-2 mr-2">وضعیت : <b>در حال بررسی</b></span>
                                    @endif
                                </div>
                                <div class="ticket_title mt-3">
                                    <p>عنوان : <a href="{{route('panel.tickets.show',['ticket'=>$ticket->id])}}">{{$ticket->title}}</a></p>
                                </div>
                            </div>
                        @empty
                            <div style="width: 90%; margin: 40px auto;padding: 15px" class="alert alert-warning">هیچ تیکتی برای شما ثبت
                                نشده است
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
