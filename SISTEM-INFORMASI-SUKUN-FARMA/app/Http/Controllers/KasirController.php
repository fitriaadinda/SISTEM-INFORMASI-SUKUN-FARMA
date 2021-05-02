<?php

namespace App\Http\Controllers;

use App\Model\BatchObat;
use App\Model\Obat;
use App\Model\ObatDetail;
use App\Model\Resep;
use App\Model\SatuanObat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class KasirController extends Controller
{
    public function index()
    {
        $payload['satuan']= SatuanObat::all();
        $payload['obat']= Obat::with('kategori')->get();
        $payload['resep']= Resep::all();
        return view('kasir/index', $payload);
    }

    public function invoice(){
        return view('kasir/invoice/index');
    }

    public function detailObat($id)
    {
        $payload['obat'] = Obat::with(['kategori', 'batchObat', 'detailObat'])->where('id', $id)->first();
    
        return view('kasir/obat/detail', $payload);
    }
}
