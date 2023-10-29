<?php

namespace App\Controllers;
use App\Models\ModelLatihan1;
use App\Controllers\BaseController;

class Contoh1 extends BaseController
{
    public function index()
    {
        echo "<h1>Perkenalan</h1>";
        echo "Nama saya Kris Setiyadi
              saya tinggal di bekasi";
    }

    public function penjumlahan($n1 = 0, $n2 = 0) {
        $modelLatihan = new ModelLatihan1();
        $data['nilai1'] = $n1;
        $data['nilai2'] = $n2;
        $data['hasil'] = $modelLatihan->jumlah($n1, $n2);
        return view('latihan_wp/index', $data);
        

    }
}
