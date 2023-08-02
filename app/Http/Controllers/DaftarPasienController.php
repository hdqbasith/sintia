<?php

namespace App\Http\Controllers;

use App\Models\AuthUser;
use App\Models\DaftarPasien;
use App\Models\PasienAntrean;
use App\Models\UserSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DaftarPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $mulai = Carbon::now()->format('Y-m-d');
        $antrean = PasienAntrean::whereDate('booking_mulai', '=', $mulai)->count();
        if ($antrean == 0) UserSetting::where('key', '=', 'nomor_antrean')->update(['content' => 1]);
        return Inertia::render('List/ListPasien', [
            'pasiens' => DaftarPasien::all(),
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
        $request->validate([
            'nomor_rm' => 'nullable|numeric|unique:daftar_pasiens,nomor_rm,' . $data['id'],
            'nama' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'nik' => 'nullable|numeric',
            'bpjs' => 'nullable|numeric',
            'hp' => 'nullable|numeric',
        ]);
        $data['tanggal_lahir'] = date('Y-m-d', strtotime($data['tanggal_lahir']));
        $data['created_by'] = auth()->user()->id;
        DaftarPasien::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarPasien  $daftarPasien
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarPasien $daftarPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarPasien  $daftarPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarPasien $daftarPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarPasien  $daftarPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarPasien $daftarPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarPasien  $daftarPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPasien $daftarPasien)
    {
        //
    }
}
