@extends("frontend.layouts-panel.app")

@section("breadcrumb")
ویرایش حساب کاربری
@endsection

@section("content")
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold">ویرایش حساب کاربری</h2>
                </div>
                <hr>
                @livewire("edit-profile")
            </div>
        </div>

    </main>
@endsection
