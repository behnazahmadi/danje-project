@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">پاسخ ادمین</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.tickets.replay.store",["ticket"=>$ticket->id])}}" method="post"  class="needs-validation" >
                    @csrf

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عنوان</label>
                            <input type="text" class="form-control"id="validationTooltip01" placeholder="عنوان" value="{{$ticket->title}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">موضوغ</label>
                            <input type="text" class="form-control"id="validationTooltip01" placeholder="موضوع" value="{{$ticket->topic}}">
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">متن کامنت کاربر</label>
                            <textarea  class="form-control" placeholder="متن کامنت" >{{$ticket->content}}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">ایمیل کاربر</label>
                            <input type="text" class="form-control" id="validationTooltip01" value="{{$ticket->user->email}}" placeholder="ایمیل کاربر" >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">پاسخ ادمین</label>
                            <textarea name="content" class="form-control" placeholder="متن کامنت" ></textarea>
                            @error("content")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <input type="text" hidden name="parent_id" class="form-control" id="validationTooltip01" value="{{$ticket->id}}">
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">ثبت پاسخ</button>
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

