@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">لیست کامنت ها</h3>

            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>کاربر</th>
                        <th>وضعیت</th>
                        <th>متن</th>
                        <th>پاسخ</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->commentable->title}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>
                               @if($comment->status)
                                   <span class="badge badge-success"> تایید شده</span>
                                @else
                                   <span class="badge badge-warning">تایید نشده</span>
                               @endif
                            </td>
                            <td>{!! shorter($comment->content,40) !!}</td>
                            <td>
                                @if($comment->parent_id)
                                    <a class="badge badge-secondary text-white">پاسخ دادن</a>
                                @else
                                    <a href="{{route("admin.comments.replay",["comment"=>$comment->id])}}" class="badge badge-secondary text-white">پاسخ دادن</a>
                                @endif

                            </td>
                            <td class="d-flex">
                                <form action="{{route("admin.comments.destroy",["comment"=>$comment->id])}}"
                                      method="post" id="delete_comment_{{$comment->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="{{route("admin.comments.edit",["comment"=>$comment->id])}}" class="badge badge-warning ml-2">ویرایش</a>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_comment_{{$comment->id}}").submit()' class="badge badge-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$comments->render()}}
                </p>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script src="{{asset("vendors/dataTable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("vendors/dataTable/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/js/examples/datatable.js")}}"></script>

    <!-- App scripts -->
    <script src="{{asset("assets/js/app.js")}}"></script>
@endsection
