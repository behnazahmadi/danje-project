@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ویرایش کاربر</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.users.update",["user"=>$user->id])}}" method="post"  class="needs-validation">
                    @csrf
                    @method("PUT")

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">نام</label>
                            <input type="text" class="form-control" name="name" id="validationTooltip01" placeholder="نام" value="{{old("name",$user->name)}}" required>
                            @error("name")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">نام</label>
                            <input type="email" class="form-control" name="email" id="validationTooltip01" placeholder="نام" value="{{old("email",$user->email)}}" required>
                            @error("email")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">نقش</label>
                            <select name="role" id="" class="form-control">
                                <option @if($user->role == "admin") selected @endif value="admin">admin</option>
                                <option value="user" @if($user->role == "user") selected @endif >user</option>
                            </select>
                            @error("role")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">وضعیت</label>
                            <select name="status" id="" class="form-control">
                                <option @if($user->status) selected @endif value="1">فعال</option>
                                <option @if(!$user->status) selected @endif value="0">مسدود</option>
                            </select>
                            @error("status")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">ویرایش</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@section("content")
    <script>
        //  Form Validation
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    </script>
@endsection
