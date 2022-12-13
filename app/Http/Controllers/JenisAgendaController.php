<?php

namespace App\Http\Controllers;

use App\Models\JenisAgenda;
use Illuminate\Http\Request;

class JenisAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenis_agendas = JenisAgenda::all();
        return view('jenis_agenda.index', compact('jenis_agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jenis_agenda.create');
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
            'kode' => 'required',
            'nama' => 'required'
        ]);
        JenisAgenda::create($request->post());
        return redirect()->route('jenisagenda.index')->with('success', 'Sukses Menambah Data Jenis Agenda');
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
        $jenis_agenda = JenisAgenda::findOrfail($id);
        return view('jenis_agenda.edit', compact('jenis_agenda'));
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
            'kode' => 'required',
            'nama' => 'required'
        ]);
        $jenis_agenda = JenisAgenda::findOrfail($id);
        $jenis_agenda->fill($request->post())->save();

        return redirect()->route('jenisagenda.index')->with('success', 'Jenis Agenda Berhasil Diupdate');
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
        $jenis_agenda = JenisAgenda::findOrfail($id);
        $jenis_agenda->delete();
        return redirect()->route('jenisagenda.index')->with('success', 'Jenis Agenda Berhasil Dihapus');
    }
}
