<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Divisi;
use App\Models\JenisAgenda;
use App\Models\PersonalData;
use App\Models\StatusKegiatan;
use Illuminate\Http\Request;

class RancanganBiasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jenisagenda = JenisAgenda::pluck('nama', 'id');
        $divisi = Divisi::pluck('nama', 'id');
        $penanggungjawab = PersonalData::where('tipe', 'internal')->pluck('nama', 'id');
        $pengisi = PersonalData::pluck('nama', 'id');
        $statuskegiatan = StatusKegiatan::pluck('nama', 'id');
        return view('rancangan.biasa.create', compact(['jenisagenda','divisi','penanggungjawab','pengisi', 'statuskegiatan']));
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
        Agenda::create($request->post());
        return redirect()->route('agenda.index')->with('success', 'Sukses Menambah Data Rancangan Agenda Biasa');
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
}
