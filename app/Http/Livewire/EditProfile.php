<?php

namespace App\Http\Livewire;

use App\services\ImageService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads,LivewireAlert;

    public $profile_image;
    public $name;
    public $about_me;
    public $user;

    protected $rules = [
        'name' => 'required',
        'about_me' => 'nullable',
        'profile_image' => 'nullable|image|max:2000',
    ];

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->about_me = auth()->user()->about_me;
    }

    public function editProfile()
    {
       $data = $this->validate();

        $data = $this->imageSave($data);

        if (is_null($data['profile_image'])) {
            $data['profile_image'] = auth()->user()->profile_image;
        }

        auth()->user()->update($data);

        $this->alert("success","حساب کاربری شما با موفقیت ویرایش شد",[
            'position' => 'bottom-end'
        ]);

        $this->reset();


    }

    /**
     * process store image
     * @param array $data
     * @return array
     */
    protected function imageSave(array $data): array
    {
        if (!is_null($this->profile_image)) {
            if ($this->profile_image->getClientOriginalName() != '') {

                File::delete(public_path('/assets/users/' . auth()->user()->profile_image));

                $imageName = Str::random(7) . '.' . $this->profile_image->extension();

                 $this->profile_image->storeAs('users', $imageName, 'images_user');

                $data['profile_image'] = $imageName;
            }
        }
        return $data;
    }

    public function render()
    {
        $this->user = auth()->user();
        return view('livewire.edit-profile');
    }
}
