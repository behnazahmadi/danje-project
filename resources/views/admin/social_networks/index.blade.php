@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">شبکه های اجتماعی</h3>
                <p>
                    <a href="{{route("admin.social_networks.create")}}" class="btn btn-primary mt-2 text-white">ایجاد شبکه اجتماعی</a>
                </p>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>لینک</th>
                        <th>لوگو</th>
                        <th>کلاس آیکن</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($social_networks as $social_network)
                        <tr>
                            <td>{{$social_network->name}}</td>
                            <td>{{$social_network->link}}</td>
                            <td>
                                <img src="{{asset("assets/social_networks/$social_network->logo")}}" width="35" alt="">
                            </td>
                            <td>{{$social_network->classIcon}}</td>
                            <td class="d-flex">
                                <form action="{{route("admin.social_networks.destroy",["social_network"=>$social_network->id])}}"
                                      method="post" id="delete_social_network_{{$social_network->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_social_network_{{$social_network->id}}").submit()' class="badge badge-danger">حذف</a>
                                <a href="{{route("admin.social_networks.edit",["social_network"=>$social_network->id])}}"  class="badge badge-warning">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$social_networks->render()}}
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
