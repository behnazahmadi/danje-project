<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogle extends Controller
{
    public function redirect()
    {
        return Socialite::driver("google")->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver("google")->user();

        $userCheck =  DB::table("users")->where("email",$user->email)->first();

        if (!is_null($userCheck)){
            auth()->loginUsingId($userCheck->id);
            return redirect("/");
        }

        $user = $this->createUser($user);

        auth()->loginUsingId($user->id,TRUE);

        return redirect("/");
    }

    /**
     * @param \Laravel\Socialite\Contracts\User $user
     * @return mixed
     */
    public function createUser(\Laravel\Socialite\Contracts\User $user)
    {
        $user = \App\Models\User::create([
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "password" => ""
        ]);
        return $user;
    }

}
