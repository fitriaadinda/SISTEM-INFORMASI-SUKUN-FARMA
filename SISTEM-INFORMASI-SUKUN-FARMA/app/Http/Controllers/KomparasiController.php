<?php

namespace App\Http\Controllers;

use App\Model\KomparasiSatuanObat;
use App\Model\Obat;
use App\Model\SatuanObat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class KomparasiController extends Controller
{
    public function index()
    {
        $payload['komparasi'] = KomparasiSatuanObat::all();
        $payload['satuan'] = SatuanObat::all();
        $payload['obat'] = Obat::all();
        return view('komparasi/index', $payload);
    }

    public function prosesTambah(Request $request)
    {
        $komparasi = new KomparasiSatuanObat();
        $komparasi->obat_id = $request->input('nama');
        $komparasi->satuan_awal_id = $request->input('satuan_awal');
        $komparasi->satuan_akhir_id = $request->input('satuan_akhir');
        $komparasi->jumlah = $request->input('jumlah');
        $komparasi->save();

        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id)
    {
        $komparasi = KomparasiSatuanObat::find($id);
        $komparasi->obat_id = $request->input('nama');
        $komparasi->satuan_awal_id = $request->input('satuan_awal');
        $komparasi->satuan_akhir_id = $request->input('satuan_akhir');
        $komparasi->jumlah = $request->input('jumlah');
        $komparasi->save();
        return redirect()->back()->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $komparasi = KomparasiSatuanObat::find($id);
        if (!$komparasi) return redirect('komparasi')->with('error_message', 'Obat tidak ditemukan');
        $komparasi->delete();

        return redirect('komparasi')->with('success_message', 'Data berhasil dihapus');
    }
}
