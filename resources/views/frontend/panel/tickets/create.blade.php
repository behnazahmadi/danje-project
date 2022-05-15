@extends("frontend.layouts-panel.app")

@section("breadcrumb")
    <a href="{{route('panel.tickets.index')}}">تیکت ها</a>
@endsection

@section("content")
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold">تیکت ها</h2>
                </div>
                <hr>
                @livewire("add-ticket")
            </div>
        </div>

    </main>
@endsection
