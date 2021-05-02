<?php

namespace App\Http\Controllers\API;

use App\Model\Resep;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function getObatByResepId($id) {
        $resep = Resep::find($id);

        if (!$resep)  {
            return response()->json([
                "success" => false
            ]);
        }

        return response()->json([
            "success" => true,
            "obat" => $resep->obat->map(function ($obat) {
                $result = new \stdClass();
                $result->id = $obat->id;
                $result->kode_obat = $obat->kode_obat;
                $result->nama = $obat->nama;
                $result->harga_jual = $obat->harga_jual;
                $result->harga_total = $obat->pivot->satuanObat->id == 3 ? $obat->harga_jual * $obat->pivot->qty : 0; // @TODO : Buat rumus untuk mengubah jika satuannya tidak tablet
                $result->satuan = $obat->pivot->satuanObat->nama;
                $result->qty = $obat->pivot->qty;

                return $result;
            }),
        ]);
    }
}
