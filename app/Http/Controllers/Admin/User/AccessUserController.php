<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use  \Illuminate\Contracts\View\View;


class AccessUserController extends Controller{

    public function permissions(User $user): View
    {
        return view('admin.users.permissions', compact('user'));
    }

    /**
     * save access permission and role
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function savePermissions(Request $request, User $user)
    {
        $data = $this->validated($request);

        if (!$request->has('roles')) {
            $user->roles()->sync([]);
        }
        if (!$request->has(['permissions'])) {
            $user->permissions()->sync([]);
        }

        if ($request->has('roles')) {
            $user->roles()->sync($data['roles']);
        }

        if ($request->has('permissions')) {
            $user->permissions()->sync($data['permissions']);
        }

        return  redirect()->route("admin.users.index");

    }

    /**
     * validation
     * @param Request $request
     * @return array
     */
    protected function validated(Request $request)
    {
        $data = $request->validate([
            'roles' => ['nullable', 'array'],
            'permissions' => ['nullable', 'array']
        ]);

        return $data;
    }

}
