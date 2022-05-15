<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $user = User::with("bookmarks")->where("id",Auth::id())->first();
        return view("frontend.panel.bookmark",compact("user"));
    }
}
