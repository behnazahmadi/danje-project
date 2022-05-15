<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactUsRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view("frontend.contact-us");
    }

    public function saveMessage(ContactUsRequest $request)
    {
        $validData = $request->validated();

        Contact::create($validData);

        return back();
    }
}
