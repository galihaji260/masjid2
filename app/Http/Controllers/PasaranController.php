<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateInterval;
use DateTime;
use DatePeriod;
use Illuminate\Support\Facades\DB;

class PasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $req = $request->input();
        if (isset($req['submit']) && $req['submit'] == 'Generate') {
            $tanggal = $this->getAllPasaranDateInYear($req['tahun'], $req['hari'], $req['pasar']);
            return view('pasaran.input', ['dates' => $tanggal]);
        }
        return view('pasaran.index');
    }

    public function getAllPasaranDateInYear($year, $dayname, $pasaran)
    {
        $result = [];
        $startdate = "$year-01-01";
        $enddate = "$year-12-31";
        $dates = $this->getDatesFromRange($startdate, $enddate);
        foreach ($dates as $date) {
            $day = date('l', strtotime($date));
            $pasar = $this->getPasaran($date);
            if ($day == $dayname && $pasar == $pasaran) {
                array_push($result, $date);
            }
        }

        return $result;
    }

    function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {

        // Declare an empty array
        $array = array();

        // Variable that store the date interval
        // of period 1 day
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        // Use loop to store date into array
        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        // Return the array elements
        return $array;
    }

    public function getPasaran($tanggal)
    {
        // dipilih tanggal 1 Maret 2010 sebagai acuan
        // hari pasaran tanggal 1 Maret 2010 adalah 'Pon'
        $tgl1 = "2010-03-01";

        // array urutan nama hari pasaran dimulai dari 'Pon' 
        $pasaran = array('pon', 'wage', 'kliwon', 'legi', 'pahing');

        // proses mencari selisih hari antara kedua tanggal 
        $pecah1 = explode("-", $tgl1);
        $date1 = $pecah1[2];
        $month1 = $pecah1[1];
        $year1 = $pecah1[0];

        $pecah2 = explode("-", $tanggal);
        $date2 = $pecah2[2];
        $month2 = $pecah2[1];
        $year2 =  $pecah2[0];

        $jd1 = GregorianToJD($month1, $date1, $year1);
        $jd2 = GregorianToJD($month2, $date2, $year2);

        $selisih = $jd2 - $jd1;

        // hitung modulo 5 dari selisih harinya
        $mod = $selisih % 5;

        return $pasaran[$mod];
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
        $req = $request->input();
        for ($i = 0; $i < count($req['tanggal']); $i++) {
            DB::table('input')->insert([
                'tanggal' => $req['tanggal'][$i],
                'kegiatan' => $req['kegiatan'][$i],
                'penanggung_jawab' => $req['penanggungjawab'][$i]
            ]);
        }
        // dd($req);
        return redirect()->route('pasaran.index');
    }

}
