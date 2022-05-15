<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Facade\FlareClient\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = Role::Latestpaginate(20);

        return view("admin.roles.index",compact("roles"));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        return \view("admin.roles.create");
    }

    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            "name" => "required",
            "label" => "required"
        ]);

        Role::create($validData);

        return redirect()->route("admin.roles.index");

    }

    /**
     * Display the specified role.
     *
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        return \view("admin.roles.edit",compact("role"));
    }

    /**
     * Update the specified role in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $validData = $request->validate([
            "name" => "required",
            "label" => "required"
        ]);

        $role->update($validData);

        return redirect()->route("admin.roles.index");
    }

    /**
     * Remove the specified role from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
