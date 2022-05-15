<div>
    <div class="ticket_title mt-3 font-weight-bold d-flex justify-content-between">
        <p><a style="text-decoration: underline" href="{{route('blogs.show',['blog'=>$bookmark->bookmarkable->slug])}}">{{$bookmark->bookmarkable->title}}</a></p>
{{--        <p><a href="" wire:click.prevent="delBookmark" class="text-white btn btn-danger btn-sm">del</a></p>--}}
    </div>
</div>
