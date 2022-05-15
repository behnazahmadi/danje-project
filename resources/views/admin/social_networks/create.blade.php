@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ایجاد شبکه اجتماعی</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.social_networks.store")}}" method="post"  class="needs-validation" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">لوگو</label>
                            <input type="file" name="logo" class="form-control"id="validationTooltip01" >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">اسم</label>
                            <input type="text" name="name" class="form-control"id="validationTooltip01" placeholder="اسم" value="{{old("name")}}" >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">لینک</label>
                            <input type="text" name="link" class="form-control"id="validationTooltip01" placeholder="لینک" value="{{old("link")}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">کلاس آیکن</label>
                            <input type="text" name="classIcon" class="form-control" id="validationTooltip01" value="{{old("classIcon")}}" placeholder="کلاس آیکن" >
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">ایجاد شبکه اجتماعی</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection

