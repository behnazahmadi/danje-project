<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\Contact;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the contacts
     * @return Application|Factory|View
     */
    public function index()
    {
        $contacts = Contact::where("parent_id",0)->Latestpaginate(20);

        return view("admin.contacts.index",compact("contacts"));
    }

    /**
     * Show the form for replay to contacts
     * @param Contact $contact
     * @return Application|Factory|View
     */
    public function replay(Contact $contact)
    {
        return view("admin.contacts.replay",compact("contact"));
    }

    /**
     * Store a new replay for contacts
     * @param ContactUsRequest $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function saveReplay(ContactUsRequest $request,Contact $contact): RedirectResponse
    {
        $user = auth()->user();

        $validData = $request->validated();

        $contact->update(["status"=>TRUE]);

        $contact = $this->storeReplayAdminInDatabase($user, $validData, $contact);

        // TODO send email to current contact user
//        Mail::to($validData["email"])->send(new SendEmailToCurrentContactUser($contact->content));

        return redirect()->route("admin.contacts.index");

    }

    /**
     * Remove the specified contact from storage.
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return back();
    }

    /**
     * @param Authenticatable|null $user
     * @param array $validData
     * @param Contact $contact
     * @return mixed
     */
    public function storeReplayAdminInDatabase(?Authenticatable $user, array $validData, Contact $contact)
    {
       $contact = Contact::create([
            "name" => $user->name,
            "email" => $user->email,
            "parent_id" => $validData["parent_id"],
            "content" => $validData["content"],
            "topic" => $contact->topic
        ]);

       return $contact;
    }
}
