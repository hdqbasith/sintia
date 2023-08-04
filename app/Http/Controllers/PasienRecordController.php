<?php

namespace App\Http\Controllers;

use App\Models\DaftarCheckup;
use App\Models\PasienAntrean;
use App\Models\PasienRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PasienRecordController extends Controller
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
        $antrean=PasienAntrean::whereKehadiran('P')->whereDate('booking_mulai', '>=', $mulai)->whereDate('booking_mulai', '<=', $selesai)->with('daftarPasien')->first();

        $listCheckup=DaftarCheckup::all()->keyBy('id');
        return Inertia::render('List/ListPemeriksaan', [
            'antrean' => $antrean,
            'listCheckup'=>$listCheckup,
            'listRecord'=>PasienRecord::wherePasien($antrean->pasien)->whereDate('created_at','=',$mulai)->get(),
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
        $data=$request->all();
        $pasien=$data['pasien'];
        unset($data['pasien']);
        $data=json_decode($data['data']);
        $insert=[];
        foreach ($data as $d) {
            $insert[$d->key]=['pasien'=>$pasien,'tabel'=>'daftar_checkups','kode'=>$d->key,'keterangan'=>$d->val];
        }
        PasienRecord::insert($insert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienRecord  $pasienRecord
     * @return \Illuminate\Http\Response
     */
    public function show(PasienRecord $pasienRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienRecord  $pasienRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(PasienRecord $pasienRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienRecord  $pasienRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasienRecord $pasienRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienRecord  $pasienRecord
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request->all();
        PasienRecord::whereId($id)->delete();
        return redirect()->back();
    }
}
