@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ویرایش کاربر</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.categories.update",["category"=>$category->id])}}" method="post"  class="needs-validation">
                    @csrf
                    @method("PUT")

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">نام</label>
                            <input type="text" class="form-control" name="name" id="validationTooltip01" placeholder="نام" value="{{old("name",$category->name)}}" required>
                            @error("name")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">لینک</label>
                            <input type="text" class="form-control" name="link" id="validationTooltip01" placeholder="لینک" value="{{old("link",$category->link)}}" required>
                            @error("link")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">{{__("نوع")}}</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="gallery">gallery</option>
                                    <option value="menu">menu</option>
                                    <option value="blog">blog</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent_id">{{__("دسته مادر")}}</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">single</option>
                                    @foreach($cat = App\Models\Category::all() as $category)
                                        <option
                                            @if(request()->has("parent") && $cat->contains(request('parent')))
                                            @if($category->id == request('parent'))
                                            {{"selected"}}
                                            @endif
                                            @endif
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
