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

    public function penjumlahan($n1, $n2) {
        $modelLatihan = new ModelLatihan1();
        $hasil = $modelLatihan->jumlah($n1, $n2);
        return $hasil;

    }
}
