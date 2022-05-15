@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">لیست برچسب ها</h3>
                <p>
                    <a href="{{route("admin.tags.create")}}" class="btn btn-primary mt-2 text-white">ایجاد برچسب</a>
                </p>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->label}}</td>

                            <td class="d-flex">
                                <form action="{{route("admin.tags.destroy",["tag"=>$tag->id])}}"
                                      method="post" id="delete_tag_{{$tag->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="{{route("admin.tags.edit",["tag"=>$tag->id])}}" class="badge badge-warning ml-2">ویرایش</a>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_tag_{{$tag->id}}").submit()' class="badge badge-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$tags->render()}}
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
