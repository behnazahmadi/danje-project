<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddTicket extends Component
{
    use LivewireAlert;

    public $topic;
    public $importance;
    public $title;
    public $content;
    public $file;

    protected $rules = [
        "topic" => "required",
        "content" => "required",
        "title" => "required",
        "importance" => "required"
    ];

    public function addTicket()
    {
        $validData = $this->validate();

        auth()->user()->tickets()->create($validData);

        $this->alert("success","تیکت شما با موفقیت ثبت شد.",[
            "position" => "bottom-end"
        ]);

        $this->reset();

    }

    public function render()
    {
        return view('livewire.add-ticket');
    }
}
