@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">گالری عکس</h3>
                <p>
                    <a href="{{route("admin.galleries.create")}}" class="btn btn-primary mt-2 text-white">ایجاد تصویر جدید</a>
                </p>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>عکس</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{$gallery->title}}</td>
                            <td><img src="{{asset("assets/galleries/$gallery->image")}}" width="50" alt=""></td>
                            <td>{{\Morilog\Jalali\Jalalian::forge($gallery->created_at)->ago()}}</td>
                                <form action="{{route("admin.galleries.destroy",["gallery"=>$gallery->id])}}"
                                      method="post" id="delete_blog_{{$gallery->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            <td class="d-flex">
                                <a href="{{route("admin.galleries.edit",["gallery"=>$gallery->id])}}" class="badge badge-warning ml-2">ویرایش</a>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_blog_{{$gallery->id}}").submit()' class="badge badge-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$galleries->render()}}
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
