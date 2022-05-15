<ul class="list-group list-group-flush" style="margin-top: 0">
    @foreach($categories as $cate)
        <li class="list-group-item" style="border: none;border-right: 1px solid black">
            <div class="d-flex">
                <span>{{ $cate->name }}</span>
                <div class="actions mr-2">
                    <form action="{{ route('admin.categories.destroy', $cate->id) }}" id="cate-{{ $cate->id }}-delete" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                    <a href="#" onclick='event.preventDefault();document.getElementById("cate-{{ $cate->id }}-delete").submit()' class="text-white badge badge-danger">حذف</a>
                    <a href="{{route("admin.categories.edit",$cate)}}" class="text-white badge badge-primary">ویرایش</a>
                    <a href="{{ route('admin.categories.create') }}?parent={{ $cate->id }}" class=" badge badge-warning">ثبت زیر دسته</a>
                </div>
            </div>
            @if($cate->childs->count())
                @include('admin.categories.categories-group' , [ 'categories' => $cate->childs])
            @endif

            @if($cate->parent_id == 0)
                <hr>
            @endif
        </li>
    @endforeach
</ul>
