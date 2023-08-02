<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class Setting extends Controller
{
    function getWilayah(Request $request){
        $w=$request->all();
        if(!$w) $w=['parent'=>0];
        $data=Wilayah::where($w)->get();
        return $data;
    }
}
