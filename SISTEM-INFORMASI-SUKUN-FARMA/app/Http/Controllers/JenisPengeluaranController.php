<?php

namespace App\Http\Controllers;

use App\Model\JenisPengeluaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class JenisPengeluaranController extends Controller
{
    public function index()
    {
        $payload['jenis'] = JenisPengeluaran::all();
        return view('jenis-pengeluaran/index', $payload);
    }

    public function prosesTambah(Request $request)
    {
        JenisPengeluaran::create($request->all());
        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id)
    {
        JenisPengeluaran::where(['id'=> $id ])->update(['jenis_pengeluaran'=>$request->input('jenis_pengeluaran')]);
        return redirect()->back()->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $jenis = JenisPengeluaran::find($id);
        if (!$jenis) return redirect('jenis-pengeluaran')->with('error_message', 'Data tidak ditemukan');
        $jenis->delete();

        return redirect('jenis-pengeluaran')->with('success_message', 'Data berhasil dihapus');
    }
}
