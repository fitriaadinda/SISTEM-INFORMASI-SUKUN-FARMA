<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Obat;

class ObatController extends Controller
{

    public function getObatById($kodeObat) {
        $obat = Obat::where('kode_obat', $kodeObat)->first();
        if (!$obat)  {
            return response()->json([
                "success" => false
            ]);
        }

        return response()->json([
            "success" => true,
            "obat" => $obat
        ]);
    }
}
