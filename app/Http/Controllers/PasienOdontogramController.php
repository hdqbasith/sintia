<?php

namespace App\Http\Controllers;

use App\Models\PasienOdontogram;
use Illuminate\Http\Request;

class PasienOdontogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        PasienOdontogram::insert($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienOdontogram  $pasienOdontogram
     * @return \Illuminate\Http\Response
     */
    public function show(PasienOdontogram $pasienOdontogram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienOdontogram  $pasienOdontogram
     * @return \Illuminate\Http\Response
     */
    public function edit(PasienOdontogram $pasienOdontogram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienOdontogram  $pasienOdontogram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasienOdontogram $pasienOdontogram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienOdontogram  $pasienOdontogram
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasienOdontogram $pasienOdontogram)
    {
        //
    }
}
