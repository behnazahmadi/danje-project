@extends("frontend.layouts-panel.app")

@section("breadcrumb")
    تیکت ها
@endsection

@section("content")

    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <header class="ticket_header">
                    <h2 class="title_head_panel">لیست بوکمارک ها</h2>
                </header>
                <div class="card-body" style="text-decoration: underline">
                    <div class="bookmark">
                        @forelse($user->bookmarks as $bookmark)
                            @livewire("bookmark-panel",['bookmark'=>$bookmark])
                            <hr>
                        @empty
                            <div style="width: 90%; margin: 40px auto;padding: 15px" class="alert alert-warning">بوکمارکی برای نمایش وجود ندارد
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
