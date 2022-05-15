@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ویرایش کامنت</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.comments.update",["comment"=>$comment->id])}}" method="post"  class="needs-validation" >
                    @csrf
                    @method("PUT")

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عنوان</label>
                            <input type="text" class="form-control"id="validationTooltip01" placeholder="عنوان" value="{{$comment->commentable->title}}" >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">اسم کاربر</label>
                            <input type="text" class="form-control"id="validationTooltip01" placeholder="عنوان" value="{{$comment->user->name}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">ایمیل کاربر</label>
                            <input type="text" class="form-control" id="validationTooltip01" value="{{$comment->user->email}}" placeholder="ایمیل کاربر" >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">وضعیت</label>
                            <select name="status" id="" class="form-control">
                                <option @if($comment->status) selected @endif  value="1">تاییده شده</option>
                                <option @if(!$comment->status) selected @endif  value="0">تایید نشده</option>
                            </select>
                            @error("status")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">متن کامنت کاربر</label>
                            <textarea name="content"  class="form-control" placeholder="متن کامنت" >{{$comment->content}}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="text" hidden name="parent_id" class="form-control" id="validationTooltip01" value="{{$comment->id}}">
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">ویرایش</button>
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

