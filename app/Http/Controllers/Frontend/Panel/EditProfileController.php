<?php

namespace App\Http\Controllers\Frontend\Panel;

use App\Http\Controllers\Controller;
use App\services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class EditProfileController extends Controller
{

    const FILE_NAME = "profile_image";

    /**
     * @var ImageService
     */
    public $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view("frontend.panel.editProfile");
    }

    public function storeUserInfo(Request $request)
    {
        $validData = $request->validate([
           "name" => ["required"],
           "about_me" => ["sometimes"],
        ]);

        if ($request->hasFile(self::FILE_NAME)){

            $imageFile = $request->file(self::FILE_NAME);

            if (File::exists(public_path("assets/users/".\auth()->user()->profile_image))){
                File::delete(public_path("assets/users/".\auth()->user()->profile_image));
            }

           $imageRandomName =  $this->imageService->make($imageFile,"users",self::FILE_NAME);

            $validData[self::FILE_NAME] = $imageRandomName;
        }

        \auth()->user()->update($validData);

        return redirect()->route("panel.index");
    }


    public function changePasswordView()
    {
        return view("frontend.panel.changePassword");
    }

    public function changePassword(Request $request)
    {

       $validData = $request->validate([
          "old_password" => ["required","min:6"],
          "password" => ["required","min:6","confirmed"]
       ]);

       if (!empty(\auth()->user()->password)){
           if (!Hash::check($validData["old_password"],\auth()->user()->password)){
               return back()->with("wrong_pass","رمز عبور فعلی خود را اشتباه وارد کرده اید!");
           }
       }


        \auth()->user()->password = Hash::make($validData["password"]);
        \auth()->user()->save();

       return back()->with("changed_pass","رمز عبور شما با موفقیت تفییر داده شد");

    }


}
