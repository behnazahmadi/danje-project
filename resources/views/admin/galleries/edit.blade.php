@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ایجاد بلاگ</h3>
            </div>
            <div class="card-body">
                <img src="{{asset('assets/galleries/'.$gallery->image)}}" width="70" alt="">

                <form action="{{route("admin.galleries.update",["gallery"=>$gallery])}}" method="post"  class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عکس</label>
                            <input type="file" class="form-control" name="image" id="validationTooltip01" >
                            @error("image")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عنوان</label>
                            <input type="text" class="form-control" name="title" id="validationTooltip01" placeholder="عنوان" value="{{$gallery->title}}" required>
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
