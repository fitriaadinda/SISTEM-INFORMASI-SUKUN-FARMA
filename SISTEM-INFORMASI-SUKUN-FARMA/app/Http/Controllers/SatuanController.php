<?php

namespace App\Http\Controllers;

use App\Model\SatuanObat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SatuanController extends Controller
{
    public function index()
    {
        $payload['satuan'] = SatuanObat::all();
        return view('satuan/index', $payload);
    }

    public function prosesTambah(Request $request)
    {
        SatuanObat::create($request->all());
        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id)
    {
        SatuanObat::where(['id'=> $id ])->update(['nama'=>$request->input('nama')]);
        return redirect()->back()->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $satuan = SatuanObat::find($id);
        if (!$satuan) return redirect('satuan')->with('error_message', 'Obat tidak ditemukan');
        $satuan->delete();

        return redirect('satuan')->with('success_message', 'Data berhasil dihapus');
    }
}
