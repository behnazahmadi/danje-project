@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">تماس با ما</h3>

            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>وضعیت</th>
                        <th>متن</th>
                        <th>پاسخ</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>
                               @if($contact->status)
                                   <span class="badge badge-success">پاسخ داده شده</span>
                                @else
                                   <span class="badge badge-warning">درحال بررسی</span>
                               @endif
                            </td>
                            <td>{!!$contact->content!!}</td>
                            <td>
                                @if($contact->parent_id)
                                    <a class="badge badge-secondary text-white">پاسخ دادن</a>
                                @else
                                    <a href="{{route("admin.contacts.replay",["contact"=>$contact->id])}}" class="badge badge-secondary text-white">پاسخ دادن</a>
                                @endif
                            </td>
                            <td class="d-flex">
                                <form action="{{route("admin.contacts.destroy",["contact"=>$contact->id])}}"
                                      method="post" id="delete_contact_{{$contact->id}}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="" onclick='event.preventDefault();document.getElementById("delete_contact_{{$contact->id}}").submit()' class="badge badge-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p>
                    {{$contacts->render()}}
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
