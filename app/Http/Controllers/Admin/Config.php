<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SideMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class Config extends Controller
{
    public function sideMenu(): Response
    {
        return Inertia::render('List/ListSideMenu', [
            'sideMenus' => SideMenu::all(),
            'message' => session()->has('message') ? session()->get("message") : null
        ]);
    }
    public function sideMenuStore(): RedirectResponse
    {
        return redirect()->back();
    }
}
