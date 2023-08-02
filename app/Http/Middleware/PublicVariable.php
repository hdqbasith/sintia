<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublicVariable extends Middleware
{
    function getWilayah(Request $request){
        $w=$request->all();
        if(!$w) $w=['parent'=>0];
        $data=Wilayah::where($w)->get();
        return $data;
    }
    function mdiIcons():Response{
        return Inertia::render('MdiIcon');
    }
}
