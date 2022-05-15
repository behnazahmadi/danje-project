@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">{{__("دسته بندی جدید")}}</h4>
                    <br>
                    <form action="{{route('admin.categories.store')}}" class="tab-wizard wizard-circle" enctype="multipart/form-data" method="post">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{__("نام")}}</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link">{{__("لینک")}}</label>
                                        <input type="text" name="link" class="form-control" id="link"> </div>
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="ساخت دسته">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
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
