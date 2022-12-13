<?php

namespace App\Http\Controllers;

use App\Models\PengisiYasinan;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PengisiYasinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengisi_yasinans = PengisiYasinan::leftjoin('personal_data', 'personal_data.id', 'pengisi_yasinans.pengisi')
            ->get(['pengisi_yasinans.id', 'pengisi_yasinans.pasaran', 'personal_data.nama as pengisi']);
        return view('pengisi_yasinan.index', compact('pengisi_yasinans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengisi_yasinan.create');
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
        $request->validate([
            'pasaran' => 'required',
            'pengisi' => 'required'
        ]);
        PengisiYasinan::create($request->post());
        return redirect()->route('pengisiyasinan.index')->with('success', 'Sukses Menambah Data Pengisi Yasinan');
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
        $pengisi_yasinan = PengisiYasinan::findOrfail($id);
        $personalData = PersonalData::pluck('nama', 'id');
        return view('pengisi_yasinan.edit', compact(['pengisi_yasinan', 'personalData']));
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
        $request->validate([
            'pasaran' => 'required',
            'pengisi' => 'required'
        ]);
        $pengisi_yasinan = PengisiYasinan::findOrfail($id);
        $pengisi_yasinan->fill($request->post())->save();

        return redirect()->route('pengisiyasinan.index')->with('success', 'Jenis Agenda Berhasil Diupdate');
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
        $pengisi_yasinan = PengisiYasinan::findOrfail($id);
        $pengisi_yasinan->delete();
        return redirect()->route('pengisiyasinan.index')->with('success', 'Pengisi Yasinan Berhasil Dihapus');
    }
}
