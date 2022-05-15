<?php

namespace App\Http\Controllers\Frontend\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    const FILTER = "read";

    public function index()
    {
        if (\request()->has("filter") && \request()->get("filter") == self::FILTER){
            $notifications = auth()->user()->readNotifications ;
        }else{
        $notifications = auth()->user()->unreadNotifications  ;
         auth()->user()->unreadNotifications->markAsRead();
        }

        return view("frontend.panel.notifications",compact("notifications"));
    }

}
