@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">لیست کاربران</h3>
                <p>
                    <a href="{{route("admin.blogs.create")}}" class="btn btn-primary mt-2 text-white">ایجاد بلاگ</a>
                </p>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>نویسنده</th>
                        <th>عکس</th>
                        <th>زمان خواندن</th>
                        <th>وضعیت</th>
                        <th>دسته بندی</th>
                        <th>زمان انتشار</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->user->name}}</td>
                            <td>
                               @if($blog->image)
                                    <img src="{{asset("assets/blogs/$blog->image")}}" width="50" alt="">
                                @else
                                   <span class="badge badge-dark">ثبت نشده</span>
                               @endif
                            </td>
                            <td>{{$blog->study_time}}</td>
                            <td>
                                @if($blog->status)
                                    <span class="badge badge-success">منتشر شده</span>
                                @else
                                    <span class="badge badge-success">منتشر نشده</span>
                                @endif
                            </td>

                            <td>{{$blog->category->name}}</td>

                            <td>{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->ago()}}</td>
                            <td class="d-flex">
                                <form action="{{route("admin.blogs.destroy",["blog"=>$blog->slug])}}"
                                      method="post" id="delete_blog_{{$blog->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="{{route("admin.blogs.edit",["blog"=>$blog->slug])}}" class="badge badge-warning ml-2">ویرایش</a>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_blog_{{$blog->id}}").submit()' class="badge badge-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$blogs->render()}}
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
