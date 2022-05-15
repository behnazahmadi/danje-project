<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("admin.login");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $validData = $request->validate([
           "email" => ["required","email"],
            "password"=> ["required","min:6"]
        ]);

        $user = User::where("email",$validData["email"])->where("role","admin")->first();

        if (!auth()->attempt($validData) || is_null($user)){
            return back()->with("wrongInfo","ایمیل یا رمز عبور خود را اشتباه وارد کرده اید!");
        }

        auth()->loginUsingId($user->id,$request->has("remember"));

        return redirect()->route("admin.dashboard");
    }
}
