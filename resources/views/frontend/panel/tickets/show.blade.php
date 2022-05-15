@extends("frontend.layouts-panel.app")

@section("breadcrumb")
    <a href="{{route('panel.tickets.index')}}">تیکت ها</a>
@endsection

@section("content")

    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <header class="ticket_header">
                    <h2 class="title_head_panel">{{$ticket->title}}</h2>
                    <a href="{{route('panel.tickets.index')}}"><i style="font-size: 20px" class="fas fa-arrow-left"></i></a>
                </header>
                <div class="card-body">
                    <div class="tickets">
                        <div class="box_ticket">
                            <div class="info_ticket">
                                <span>تاریخ ثبت تیکت :  <b>{{jdate($ticket->created_at)->format('d-m-Y در ساعت H:i ') }}</b></span>
                                @if($ticket->status == 'Closed')
                                    <span class="p-2 mr-2">وضعیت : <b>بسته شده</b></span>
                                @elseif($ticket->status == 'Answered')
                                    <span class="p-2 mr-2">وضعیت : <b>پاسخ داده شده</b></span>
                                @else($ticket->status == 'Pending)
                                    <span class="p-2 mr-2">وضعیت : <b>در حال بررسی</b></span>
                                @endif
                            </div>
                            <div class="ticket_title mt-3">
                                <p>عنوان : <a href="">{{$ticket->title}}</a></p>
                                <p class="text-secondary font-weight-bold"><a href="">{{$ticket->body}}</a></p>
                            </div>
                        </div>
                        @foreach($ticket->replay as $replay)
                            <div class="box_admin_ticket">
                                <div class="info_ticket">
                                    <span> تاریخ :  <b>{{jdate($replay->created_at)->format('d-m-Y در ساعت H:i ') }}</b></span>
                                </div>
                                <div class="ticket_title mt-3">
                                    <p><a href="">{!! $replay->content !!}</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
