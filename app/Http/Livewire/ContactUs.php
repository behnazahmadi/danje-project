<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ContactUs extends Component
{
    use LivewireAlert;

    public $topic;
    public $name;
    public $email;
    public $importance;
    public $content;

    protected $rules = [
        "name" => "required",
        "email" => "required|email",
        "topic" => "required|min:3",
        "content"=> "required|min:6",
//        "importance" => "required"
    ];

    public function contact()
    {
        $validData = $this->validate();

        Contact::create([
            "name" => $this->name,
            "email" => $this->email,
            "topic" => $this->topic,
            "content" => $this->content,
//            "importance" => $this->importance,
        ]);

        $this->alert("success","پیام شما با موفقیت به تیم پشتیبانی ارسال شد",[
            "position" => "bottom-end"
        ]);

        $this->reset();

    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
