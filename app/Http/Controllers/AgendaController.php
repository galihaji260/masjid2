<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Divisi;
use App\Models\JenisAgenda;
use App\Models\PersonalData;
use App\Models\StatusKegiatan;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->isMethod('post')) {
            $search = array(
                'tanggal' => $request->tahun . '-' . $request->bulan,
                'divisi' => $request->divisi,
                'jenis' => $request->jenis,
                'nama_kegiatan' => $request->keyword
            );
            $agendas = Agenda::with(['statusAgenda','pengisiAgenda','pjAgenda'])->search($search);
        } else {
            $agendas = Agenda::with(['statusAgenda','pengisiAgenda','pjAgenda'])->get();
        }
        $tahun = ['2022' => '2022', '2023' => '2023'];
        $bulan = [
            '' => '-- Pilih Bulan --',
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $divisi = Divisi::pluck('nama', 'id')->prepend('-- Pilih Divisi --', '');
        $jenis = JenisAgenda::pluck('nama', 'id')->prepend('-- Pilih Jenis --', '');
        $color = [
            'berjalan' => '#FCC000',
            'terlaksana' => '#4FBBBB',
            'dibatalkan' => '#F44444'
        ];
        return view('agenda.index', compact(['agendas', 'tahun', 'bulan', 'divisi', 'jenis', 'request', 'color']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agenda.create');
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
        $agenda = Agenda::findOrfail($id);
        $jenisagenda = JenisAgenda::pluck('nama', 'id');
        $divisi = Divisi::pluck('nama', 'id');
        $penanggungjawab = PersonalData::where('tipe', 'internal')->pluck('nama', 'id');
        $pengisi = PersonalData::pluck('nama', 'id');
        $statuskegiatan = StatusKegiatan::pluck('nama', 'id');
        return view('agenda.edit', compact(['agenda', 'jenisagenda', 'divisi', 'penanggungjawab', 'pengisi', 'statuskegiatan']));
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
            'nama_kegiatan' => 'required',
            'penanggung_jawab' => 'required'
        ]);
        $agenda = Agenda::findOrfail($id);
        $agenda->fill($request->post())->save();

        return redirect()->route('agenda.index')->with('success', 'Agenda Berhasil Diupdate');
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
        $agenda = Agenda::findOrfail($id);
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Agenda Berhasil Dihapus');
    }
}
