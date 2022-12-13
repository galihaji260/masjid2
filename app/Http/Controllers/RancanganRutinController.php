<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use App\Lib\PasaranHelper;
use App\Models\Agenda;
use App\Models\PengisiYasinan;

class RancanganRutinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divisi = Divisi::pluck('nama', 'id')->prepend('Pilih Divisi', '');
        $pic = PersonalData::where('tipe', 'internal')->pluck('nama', 'id')->prepend('Pilih PIC', '');
        $personalData = PersonalData::pluck('nama', 'id')->prepend('Pilih Pengisi', '');
        return view('rancangan.rutin.index', compact(['divisi', 'pic', 'personalData']));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function yasinan(Request $request)
    {
        //
        $req = $request->input();
        if (isset($req['submit']) && $req['submit'] == 'Generate') {
            $pasaran = new PasaranHelper();
            $dates = $pasaran->getAllPasaranInYear($req['tahun'], $req['hari']);
            $pengisi = PengisiYasinan::select(['pasaran', 'pengisi'])->get()->toArray();
            return view('rancangan.rutin.yasinan', compact(['dates', 'req', 'pengisi']));
        }
        return view('rancanganrutin.index');
    }

    public function yasinanstore(Request $request)
    {
        //
        $req = $request->input();
        for ($i = 0; $i < count($req['tanggal']); $i++) {
            Agenda::create([
                'nama_kegiatan' => $req['kegiatan'][$i],
                'tanggal' => $req['tanggal'][$i],
                'kegiatan' => $req['kegiatan'][$i],
                'penanggung_jawab' => $req['penanggungjawab'][$i],
                'pengisi' => $req['pengisi'][$i],
                'jenis' => '-',
                'status' => '-',
                'divisi' => $req['divisi'][$i]
            ]);
        }
        return redirect()->route('rancanganrutin.index');
    }

    public function lainnya(Request $request)
    {
        //
        $req = $request->input();
        if (isset($req['submit']) && $req['submit'] == 'Generate') {
            $pasaran = new PasaranHelper();
            $dates = $pasaran->getAllPasaranInYear($req['tahun'], $req['hari']);
            return view('rancangan.rutin.lainnya', compact(['dates', 'req']));
        }
        return view('rancanganrutin.index');
    }

    public function lainnyastore(Request $request)
    {
        //
        $req = $request->input();
        for ($i = 0; $i < count($req['tanggal']); $i++) {
            Agenda::create([
                'nama_kegiatan' => $req['kegiatan'][$i],
                'tanggal' => $req['tanggal'][$i],
                'kegiatan' => $req['kegiatan'][$i],
                'penanggung_jawab' => $req['penanggungjawab'][$i],
                'pengisi' => $req['pengisi'][$i],
                'jenis' => '-',
                'status' => '-',
                'divisi' => $req['divisi'][$i]
            ]);
        }
        return redirect()->route('rancanganrutin.index');
    }
}
