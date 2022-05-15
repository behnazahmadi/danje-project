@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
           <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
               <h3 style="margin-right: 20px" class="font-weight-bold">لیست کاربران</h3>
                <p>
                    <a href="{{route("admin.users.create")}}" class="btn btn-primary mt-2 text-white">ایجاد کاربر</a>
                </p>
           </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>شماره تلفن</th>
                        <th>نقش</th>
                        <th>وضعیت</th>
                        <th>عکس پروفایل</th>
                        <th>تاریخ ورود</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <span class="badge badge-dark">{{$user->phone ?? "ثبت نشده"}}</span>
                            </td>
                            <td>{{$user->role}}</td>
                            <td>
                                @if($user->status)
                                    <span class="badge badge-success">فعال</span>
                                @else
                                    <span class="badge badge-success">مسدود</span>
                                @endif
                            </td>
                            <td>
                                @if($user->profile_image)
                                    <img src="{{asset('assets/users/'.$user->profile_image)}}" width="50" alt="">
                                @else
                                    <span class="badge badge-dark">ثبت نشده</span>
                                @endif
                            </td>
                            <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}</td>
                            <td class="d-flex">
                                <form action="{{route("admin.users.destroy",["user"=>$user->id])}}"
                                      method="post" id="delete_user_{{$user->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="{{route("admin.users.edit",["user"=>$user->id])}}" class="badge badge-warning ml-2">ویرایش</a>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_user_{{$user->id}}").submit()' class="badge badge-danger">حذف</a>
                                <a href="{{route("admin.user.permissions",["user"=>$user->id])}}" class="badge badge-primary text-white ml-2">دسترسی</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$users->render()}}
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
