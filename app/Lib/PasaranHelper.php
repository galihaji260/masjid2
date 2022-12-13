<?php

namespace App\Lib;

use DateInterval;
use DatePeriod;
use DateTime;

class PasaranHelper
{
    public function getAllPasaranDateInYear($year, $dayname, $pasaran = null)
    {
        $result = [];
        $startdate = "$year-01-01";
        $enddate = "$year-12-31";
        $dates = $this->getDatesFromRange($startdate, $enddate);
        foreach ($dates as $date) {
            $day = date('l', strtotime($date));
            $pasar = $this->getPasaran($date);
            if ($pasaran && $day == $dayname && $pasar == $pasaran) {
                array_push($result, $date);
            }

            if (!$pasaran && $day == $dayname) {
                array_push($result, $date);
            }
        }

        return $result;
    }

    public function getAllPasaranInYear($year, $dayname, $pasaran = null)
    {
        $result = [];
        $startdate = "$year-01-01";
        $enddate = "$year-12-31";
        $dates = $this->getDatesFromRange($startdate, $enddate);
        foreach ($dates as $date) {
            $day = date('l', strtotime($date));
            $pasar = $this->getPasaran($date);
            if ($pasaran && $day == $dayname && $pasar == $pasaran) {
                $result[] = array(
                    'tanggal' => $date,
                    'pasaran' => $pasar
                );
            }

            if (!$pasaran && $day == $dayname) {
                $result[] = array(
                    'tanggal' => $date,
                    'pasaran' => $pasar
                );
            }
        }

        return $result;
    }

    public function getDatesFromRange($start, $end, $format = 'Y-m-d')
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

    public function getHari($tanggal)
    {
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return $dayList[$day];
    }
}
