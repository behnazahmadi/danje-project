<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::Latestpaginate(20);

        return view("admin.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.users.create");
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        // TODO store user
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        // TODO show single user
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view("admin.users.edit",compact("user"));
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validData = $request->validate([
           "name"=>"required|min:3",
           "email" => ["required","email",Rule::unique("users")->ignore($user->id)],
           "status" => "required",
            "role" => "required",
        ]);

        $user->update($validData);

        return redirect()->route("admin.users.index");

    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back();
    }
}
