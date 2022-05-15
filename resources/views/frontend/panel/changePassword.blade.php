@extends("frontend.layouts-panel.app")

@section("breadcrumb")
تغییر رمز عبور
@endsection

@section("content")
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold">تغییر رمز عبور</h2>
                </div>
                <hr>
                @livewire("change-password")
            </div>
        </div>

    </main>
@endsection
