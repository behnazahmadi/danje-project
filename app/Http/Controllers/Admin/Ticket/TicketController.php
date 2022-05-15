<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\sendReplayAdminCommentToUser;
use App\Notifications\sendReplayAdminTicketToUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{


    const ANSWERED = 'Answered';
    const PENDING = 'Pending';
    const CLOSED = 'Closed';

    /**
     * Display a listing of the tickets.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tickets = Ticket::where("parent_id",0)->latest()->paginate(20);
        return view("admin.tickets.index", compact("tickets"));
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.tickets.create");
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified ticket.
     *
     * @param Ticket $ticket
     * @return void
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param Ticket $ticket
     * @return Application|Factory|View
     */
    public function edit(Ticket $ticket)
    {
        return \view("admin.tickets.edit", compact("ticket"));
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param Request $request
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function update(Request $request, Ticket $ticket): RedirectResponse
    {
        $validData = $request->validate([
            "parent_id" => "required",
            "topic" => "required",
            "title" => "required",
            "content" => "required",
        ]);

        $ticket->update($validData);

        return redirect()->route("admin.tickets.index");
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return back();
    }

    /**
     * @param Ticket $ticket
     * @return Application|Factory|View
     */
    public function replay(Ticket $ticket)
    {
        return \view("admin.tickets.replay",compact("ticket"));
    }

    /**
     * @param Request $request
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function saveReplay(Request $request,Ticket $ticket)
    {
        $validData = $request->validate([
            "parent_id" => "required",
            "content" => "required",
        ]);

        $ticket->update(["status"=>self::ANSWERED]);

        Ticket::create([
            "user_id" => User::where("role","admin")->first()->id,
            "content" => $validData["content"],
            "parent_id" => $validData["parent_id"],
            "topic" => $ticket->topic,
            "title" => $ticket->title,
            "status" => self::ANSWERED,
        ]);

        Notification::send([$ticket->user],new sendReplayAdminTicketToUser($ticket));

        return redirect()->route("admin.tickets.index");
    }
}
