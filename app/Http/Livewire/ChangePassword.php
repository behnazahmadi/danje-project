<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ChangePassword extends Component
{
    use LivewireAlert;

    public $old_password;
    public $password;
    public $password_confirmation;


    protected $rules = [
        'old_password' => 'required|min:6',
        'password' =>  ['required', 'min:6', 'confirmed'],
    ];

    public function changePassword()
    {
        $data = $this->validate();

        if (!empty(\auth()->user()->password)){
            if (!auth()->user()->checkPassword($data)){
              $this->alert("warning","رمز عبور فعلی خود را اشتباه وارد کرده اید",[
                  "position" => "bottom-end"
              ]);
              return;
            }
        }

        \auth()->user()->password = Hash::make($this->password);
        \auth()->user()->save();

        $this->alert("success","رمز عبور شما با موفقیت تغییر کرد.",[
            "position" => "bottom-end"
        ]);

        $this->reset();

    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
