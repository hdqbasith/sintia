<?php

namespace App\Http\Controllers;

use App\Models\DaftarCheckup;
use App\Models\DaftarDiagnosis;
use App\Models\DaftarOdontogram;
use App\Models\DaftarTerapi;
use App\Models\PasienAntrean;
use App\Models\PasienCheckup;
use App\Models\PasienOdontogram;
use App\Models\PasienRecord;
use Carbon\Carbon;
use DB;
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
        $antrean = PasienAntrean::whereKehadiran('P')->whereDate('booking_mulai', '>=', $mulai)->whereDate('booking_mulai', '<=', $selesai)->with('daftarPasien')->first();
        $listCheckup = DaftarCheckup::all()->keyBy('id');
        $listOdo = DaftarOdontogram::get(['id AS value', 'kode', 'arti AS text'])->keyBy('value');
        $listDiagnoses = DaftarDiagnosis::orderBy('diagnosis')->get(['id AS value', 'diagnosis AS text']);
        $listTerapi = DaftarTerapi::orderBy('terapi')->get(['id AS value', 'terapi AS text']);
        $pasienOdo = PasienOdontogram::wherePasien($antrean?->pasien)->whereDate('created_at', '>=', $mulai)->with('daftarOdontogram')->get()->keyBy('number');
        $pasienCheckup = PasienCheckup::wherePasien($antrean?->pasien)
            ->whereDate('pasien_checkups.created_at', '>=', $mulai)
            ->join('daftar_checkups', 'pasien_checkups.kode', '=','daftar_checkups.id')
            ->get(['pasien_checkups.kode','keterangan','daftar_checkups.kode AS group'])
            ->keyBy('kode');
        $pasienRecord = PasienRecord::wherePasien($antrean?->pasien)->whereDate('created_at', '>=', $mulai)->with('daftarDiagnoses')->with('daftarTerapis')->first();
        return Inertia::render('List/ListPemeriksaan', [
            'antrean' => $antrean,
            'listCheckup' => $listCheckup,
            'listDiadnosa' => $listDiagnoses,
            'listTerapi' => $listTerapi,
            'pasienCheckup' => $pasienCheckup,
            'pasienRecord' => $pasienRecord,
            'listOdo' => $listOdo,
            'pasienOdo' => $pasienOdo,
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
    public function storeCheckup(Request $request)
    {
        $mulai = Carbon::now()->format('Y-m-d');
        $data = $request->all();
        foreach ($data as $k => $v) {
            if ($k != 'pasien') {
                $isi = ['kode' => $k, 'keterangan' => $v, 'pasien'=>$data['pasien']];
                $exist = PasienCheckup::whereKode($k)->wherePasien($data['pasien'])->whereDate('created_at', '=', $mulai)->first();
                PasienCheckup::updateOrInsert(['id' => $exist?->id], $isi);
            }
        }
    }
    public function storeRecord(Request $request)
    {
        $mulai = Carbon::now()->format('Y-m-d');
        $data = $request->all();
        $exist = PasienRecord::wherePasien($data['pasien'])->whereDate('created_at', '=', $mulai)->first();
        PasienRecord::updateOrInsert(['id' => $exist?->id], $data);
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
        $id = $request->all();
        PasienRecord::whereId($id)->delete();
        return redirect()->back();
    }
    /**
     * Print Hasil Pemeriksaan.
     *
     * @param  \App\Models\PasienRecord  $pasienRecord
     * @return \Illuminate\Http\Response
     */
    public function printPemeriksaan(Request $request): Response
    {
        $mulai = $selesai = Carbon::now()->format('Y-m-d');
        if ($request->mulai) $mulai = $request->mulai;
        if ($request->selesai) $selesai = $request->selesai;
        $antrean = PasienAntrean::whereKehadiran('P')->whereDate('booking_mulai', '>=', $mulai)->whereDate('booking_mulai', '<=', $selesai)->with('daftarPasien')->first();
        $listCheckup = DaftarCheckup::all()->keyBy('id');
        $listOdo = DaftarOdontogram::get(['id AS value', 'kode', 'arti AS text'])->keyBy('value');
        $listDiagnoses = DaftarDiagnosis::orderBy('diagnosis')->get(['id AS value', 'diagnosis AS text']);
        $listTerapi = DaftarTerapi::orderBy('terapi')->get(['id AS value', 'terapi AS text']);
        $pasienOdo = PasienOdontogram::wherePasien($antrean?->pasien)->whereDate('created_at', '>=', $mulai)->with('daftarOdontogram')->get()->keyBy('number');
        $pasienCheckup = PasienCheckup::wherePasien($antrean?->pasien)
            ->whereDate('pasien_checkups.created_at', '>=', $mulai)
            ->join('daftar_checkups', 'pasien_checkups.kode', '=','daftar_checkups.id')
            ->get(['pasien_checkups.kode','keterangan','daftar_checkups.kode AS group'])
            ->keyBy('kode');
        $pasienRecord = PasienRecord::wherePasien($antrean?->pasien)->whereDate('created_at', '>=', $mulai)->with('daftarDiagnoses')->with('daftarTerapis')->first();
        return Inertia::render('Print/Pemeriksaan', [
            'antrean' => $antrean,
            'listCheckup' => $listCheckup,
            'listDiadnosa' => $listDiagnoses,
            'listTerapi' => $listTerapi,
            'pasienCheckup' => $pasienCheckup,
            'pasienRecord' => $pasienRecord,
            'listOdo' => $listOdo,
            'pasienOdo' => $pasienOdo,
            'message' => session()->has('message') ? session()->get("message") : null
        ]);
    }
}
