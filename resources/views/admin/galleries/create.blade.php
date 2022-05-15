@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ایجاد بلاگ</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.galleries.store",)}}" method="post"  class="needs-validation" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">عکس</label>
                        <input type="file" class="form-control" name="image" id="validationTooltip01" required>
                        @error("image")
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عنوان</label>
                            <input type="text" class="form-control" name="title" id="validationTooltip01" placeholder="عنوان"  required>
                            @error("title")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">دسته بندی</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach(\App\Models\Category::where("type","gallery")->get() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error("category")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">ایجاد تصویر</button>
                </form>
            </div>
        </div>
    </main>
@endsection
