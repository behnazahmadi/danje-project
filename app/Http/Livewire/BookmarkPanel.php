<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class BookmarkPanel extends Component
{
    use LivewireAlert;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $bookmark;

    public function delBookmark()
    {
       $bookmark = $this->bookmarkIsExists();

       if (!$bookmark) return;

       $bookmark->delete();

        $this->emit("refreshComponent");

        $this->alert("success", "مقاله مد نظر از لیست علاقه مدی شما حذف شد.", [
            "position" => "bottom-end"
        ]);

    }

    function render()
    {
        return view('livewire.bookmark-panel');
    }

    private function bookmarkIsExists()
    {
        $bookmark = \App\Models\Bookmark::where("id",$this->bookmark->id)->first();

        return $bookmark ?? false;
    }

    public function refreshComponent()
    {
        $this->render();
    }
}
