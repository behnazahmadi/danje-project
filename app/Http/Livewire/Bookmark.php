<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Bookmark extends Component
{
    use LivewireAlert;

    public $blog;
    public $user;


    public function mount()
    {
        $this->user = auth()->user();
    }

    public function addBookmark()
    {
        if (!auth()->check()){
            return redirect()->to("login");
        }

       if ($this->isBookmarked()){
           return;
       }

     $this->doBookmark();

       $this->alert("success","مقاله مد نظر به لیست علاقه مندی شما اضافه شد",[
           "position" => "bottom-end"
       ]);

    }

    public function delBookmark()
    {
        if ($this->isBookmarked()){
          $bookmark = $this->blog->bookmarks()->where("user_id",$this->user->id)->first();
          if (!is_null($bookmark)){
              $bookmark->delete();

              $this->alert("success","مقاله مد نظر از لیست علاقه مدی شما حذف شد.",[
                  "position" => "bottom-end"
              ]);
          }
        }
          return null;
    }

    private function isBookmarked()
    {
        $bookmark = $this->user->bookmarks()->where("bookmarkable_id",$this->blog->id)->first();

        return $bookmark ?? FALSE;
    }

    private function doBookmark()
    {
       $bookmark = $this->blog->bookmarks()->create([
          "user_id" => $this->user->id
       ]);

       return $bookmark;
    }


    public function render()
    {
        return view('livewire.bookmark');
    }

}
