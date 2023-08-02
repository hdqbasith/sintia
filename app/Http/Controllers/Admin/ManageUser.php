<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthUser;
use App\Models\Role;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ManageUser extends Controller
{
    public function list(): Response
    {
        return Inertia::render('EditUsersView', [
            'users' => AuthUser::with('roles')->get(),
            'message' => session()->has('message') ? session()->get("message") : null
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'unique:auth_users,name|required',
            'password'=>'min:6',
            'email'=>'email|required',
            'role'=>'required',
        ]);
        $data = $request->all();
        $role = Role::findOrCreate($data['role']);
        $data['password']=Hash::make($data['password']);
        unset($data['role']);
        $user=AuthUser::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        // $user=AuthUser::whereId($user->id)->first();
        $user->syncRoles([])->assignRole($role);
        return redirect()->back();
    }
}
