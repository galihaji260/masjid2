<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\PenilaianKegiatan;
use App\Models\PersonalData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $result = Agenda::select(DB::raw('YEAR(tanggal) as year'))->distinct()->get();
        $pengisis = PersonalData::distinct()->get();

        $pengisir =  $pengisis->pluck('id');
        $now = Carbon::now();
        $years = $result->pluck('year');
        foreach ($years as $year) {
            $eval['berjalan'] = Agenda::whereYear('tanggal', '=', $year)->where('status', '1')
                ->count();
            $eval['terlaksana'] = Agenda::whereYear('tanggal', '=', $year)->where('status', '2')
                ->count();
            $eval['batal'] = Agenda::whereYear('tanggal', '=', $year)->where('status', '3')
                ->count();
            $eval['total'] = Agenda::whereYear('tanggal', '=', $year)
                ->count();

            $evals[] = [strval($year), $eval['berjalan'], $eval['terlaksana'], $eval['batal'], $eval['total']];
        }
        $data['agenda'] = json_encode($evals);

        foreach ($pengisir as $spengisi) {
            $top['kontributor'] = Agenda::where('pengisi', $spengisi)->count();
            $top['name'] = PersonalData::select('nama')->where('id', $spengisi)->first();

            $kontributors[] =  [$top['name']->nama, $top['kontributor']];
        }
        $data['kontributor'] = json_encode($kontributors);

        return view('dashboard.index', compact('data'));
    }
}
