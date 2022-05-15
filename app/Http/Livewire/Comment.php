<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Comment extends Component
{
    use LivewireAlert;

    public $blog;
    public $content;

    public function store()
    {
        auth()->user()->addComment([
            "content" => $this->content,
            "commentable_id" => $this->blog->id,
            "commentable_type" => get_class($this->blog)
        ]);

        $this->alert('success', 'نظر شما با موفقیت ثبت شد و بعد از بررسی منتشر خواهد شد',[
            'position' => 'bottom-end'
        ]);

        $this->reset();

    }

    public function render()
    {
        return view('livewire.comment');
    }
}
