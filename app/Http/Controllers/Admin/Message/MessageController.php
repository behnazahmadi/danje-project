<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Controller;
use App\Mail\sendMessagesToUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages
     * @return Application|Factory|View
     */
    public function index()
    {
        $messages = Message::Latestpaginate(20);
        return view("admin.messages.index",compact("messages"));
    }

    /**
     * Store a newly created messages in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $type = $request->get("type");

        $validData = $request->validate([
           "type" => "required",
           "subject" => "required",
            "message" => "required",
            "file" => "sometimes"
        ]);

       $message =  Message::create([
            "subject" => $validData["subject"],
            "message" => $validData["message"],
            "type" => $type != "all" ? "single" : "all"
        ]);


        if ($type != "all"){
            $user = User::where("email",$type)->first();
            $user->messages()->sync($message->id);
            Mail::to([$type])->send(new sendMessagesToUser($validData));
            $validData["type"] = "single";
        }

        if ($type == "all"){
            foreach (User::all() as $user){
                $user->messages()->sync($message->id);
                Mail::to([$user->email])->send(new sendMessagesToUser($validData));
            }
        }


        return  back();
    }

    /**
     * Remove the specified messages from storage.
     * @param Message $message
     * @return RedirectResponse
     */
    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();
        return back();
    }
}
