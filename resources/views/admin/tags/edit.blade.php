@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">{{__(" ویرایش برچسب")}}</h4>
                    <br>
                    <form action="{{route('admin.tags.update',$tag->id)}}" class="tab-wizard wizard-circle" enctype="multipart/form-data" method="post">
                        @csrf
                        @method("PUT")

                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{__("نام")}}</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{old("name",$tag->name)}}"> </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="ساخت برچسب">
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
