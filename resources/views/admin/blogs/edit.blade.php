@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ایجاد بلاگ</h3>
            </div>
            <div class="card-body">
                <form action="{{route("admin.blogs.update",["blog"=>$blog->slug])}}" method="post"  class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <img src="{{asset('assets/blogs/'.$blog->image)}}" width="50" alt="">
                        <label for="validationTooltip01">عکس</label>
                        <input type="file" class="form-control" name="image" id="validationTooltip01">
                        @error("image")
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">عنوان</label>
                            <input type="text" class="form-control" name="title" id="validationTooltip01" placeholder="عنوان" value="{{old('title',$blog->title)}}"  required>
                            @error("title")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">اسلاگ</label>
                            <input type="text" class="form-control" name="slug" id="validationTooltip01" placeholder="اسلاگ" value="{{old("slug",$blog->slug)}}"  required>
                            @error("slug")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">زمان خواندن</label>
                            <input type="text" class="form-control" name="study_time" id="validationTooltip01" value="{{old('study_time',$blog->study_time)}}" placeholder="زمان خواندن"   required>
                            @error("study_time")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">دسته بندی</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach(\App\Models\Category::all() as $category)
                                <option @if($category->id == $blog->category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error("category")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">برچسب</label>
                            <select name="tags[]" id="" class="form-control" multiple>
                                @foreach(\App\Models\Tag::all() as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            @error("tags")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">نوبسنده</label>
                        <select name="user_id" id="" class="form-control">
                            @foreach(\App\Models\User::where("role","admin")->get() as $user)
                                <option @if($user->id == $blog->user->id) selected @endif  value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error("category")
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">متن بلاگ</label>
                            <textarea name="content" id="editor" class="form-control" placeholder="متن بلاگ" >{{old("content",$blog->content)}}</textarea>
                            @error("content")
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">وضعیت</label>
                            <select name="status" id="" class="form-control">
                                <option @if($blog->status) selected @endif  value="1">فعال</option>
                                <option @if(!$blog->status) selected @endif  value="0">غیر قعال</option>
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

@section("script")
    <script>
        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            contentsLangDirection: 'ltr',
        });

    </script>
@endsection

