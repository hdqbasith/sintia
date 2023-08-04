<?php

namespace App\Http\Controllers;

use App\Models\PasienAntrean;
use App\Models\UserSetting;
use Carbon\Carbon;
use DB;
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
        $antrean=PasienAntrean::whereDate('booking_mulai', '>=', $mulai)->whereDate('booking_mulai', '<=', $selesai)->with('daftarPasien')->get();
        // if(!$antrean) $antrean=new PasienAntrean();
        return Inertia::render('List/ListAntrean', [
            'antreans' => $antrean,
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
    public function panggil(Request $request)
    {
        $data=$request->all();
        PasienAntrean::whereKehadiran('P')->update(['kehadiran'=>'S']);
        $mulai = Carbon::now()->format('Y-m-d');
        $next=PasienAntrean::whereDate('booking_mulai', '=', $mulai)->whereKehadiran('D')->select(DB::raw("MIN(`nomor`) AS min, id"))->groupBy('id')->first();
        
        if($data['antrean']=='next') PasienAntrean::whereId($next['id'])->update(['kehadiran'=>$data['kehadiran']]);
        else PasienAntrean::whereId($data['antrean'])->update(['kehadiran'=>$data['kehadiran']]);
        return redirect(route('antrean.list'));
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
