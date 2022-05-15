<div>
    @if(auth()->check() && auth()->user()->isBookmarked($blog))
            <span><i wire:click.prevent="delBookmark" class="fas fa-bookmark"></i></span>
    @else
            <span><i wire:click.prevent="addBookmark" class="far fa-bookmark"></i></span>
    @endif
</div>
