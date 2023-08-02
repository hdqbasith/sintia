<?php

namespace App\Http\Controllers;

use App\Models\PasienAntrean;
use App\Models\UserSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PasienAntreanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Response
    {
        $mulai = $selesai = Carbon::now()->format('Y-m-d');
        if ($request->mulai) $mulai = $request->mulai;
        if ($request->selesai) $selesai = $request->selesai;
        return Inertia::render('List/ListAntrean', [
            'antreans' => PasienAntrean::whereDate('booking_mulai', '>=', $mulai)->whereDate('booking_mulai', '<=', $selesai)->with('daftarPasien')->get(),
            'message' => session()->has('message') ? session()->get("message") : null
        ]);
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
        $data = $request->all();
        $mulai = Carbon::now()->format('Y-m-d');
        $max = PasienAntrean::whereDate('booking_mulai', '=', $mulai)->max('nomor');
        $data['nomor'] = $max + 1;
        PasienAntrean::create($data);
        return redirect(route('antrean.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienAntrean  $pasienAntrean
     * @return \Illuminate\Http\Response
     */
    public function show(PasienAntrean $pasienAntrean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienAntrean  $pasienAntrean
     * @return \Illuminate\Http\Response
     */
    public function edit(PasienAntrean $pasienAntrean)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienAntrean  $pasienAntrean
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasienAntrean $pasienAntrean)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienAntrean  $pasienAntrean
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasienAntrean $pasienAntrean)
    {
        //
    }
}
