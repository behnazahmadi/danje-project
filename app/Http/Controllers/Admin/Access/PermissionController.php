<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     * @return Application|Factory|View
     */
    public function index()
    {
        $permissions = Permission::Latestpaginate(20);

        return view("admin.permissions.index",compact("permissions"));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.permissions.create");
    }

    /**
     * Store a newly created permission in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validData = $request->validate([
           "name" => "required",
           "label" => "required"
        ]);

        Permission::create($validData);

        return redirect()->route("admin.permissions.index");

    }

    /**
     * Display the specified permission.
     *
     * @param Permission $permission
     * @return void
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified permission.
     * @param Permission $permission
     * @return Application|Factory|View
     */
    public function edit(Permission $permission)
    {
        return \view("admin.permissions.edit",compact("permission"));
    }

    /**
     * Update the specified permission in storage.
     * @param Request $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $validData = $request->validate([
            "name" => "required",
            "label" => "required"
        ]);

       $permission->update($validData);

        return redirect()->route("admin.permissions.index");
    }

    /**
     * Remove the specified permission from storage.
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
