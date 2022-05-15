<?php

namespace App\Http\Controllers\Frontend\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = auth()->user()->tickets()->latest()->paginate(20);
        return view("frontend.panel.tickets.index",compact('tickets'));
    }

    public function create()
    {
        return view("frontend.panel.tickets.create");
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
           "topic" => "required",
           "content" => "required",
           "title" => "required",
           "importance" => "required"
        ]);

        auth()->user()->tickets()->create($validData);

        msg("تیکت شما با موفقیت ارسال شد","success","ارسال شد");

        return redirect()->route("panel.tickets.index");
    }

    public function show(Ticket $ticket)
    {
        $this->authorize("view",$ticket);
        return view("frontend.panel.tickets.show",compact("ticket"));
    }


}
