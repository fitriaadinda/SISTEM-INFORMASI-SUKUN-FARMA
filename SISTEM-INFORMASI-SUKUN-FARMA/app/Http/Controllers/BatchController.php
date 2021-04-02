<?php

namespace App\Http\Controllers;

use App\Model\BatchObat;
use App\Model\Obat;
use Illuminate\Http\Request;


class BatchController extends Controller
{
    public function index()
    {
        // $payload['kategori'] = Kategori::all();
        // return view('kategori/index', $payload);
    }

    public function prosesTambah(Request $request, $obat_id)
    {
        // $input = $request->validated();

        // BatchObat::create($request->input('kode_batch'));
        $batch = Obat::find($obat_id);
        $batch->batchObat()->create(['kode_batch' => $request->input('kode_batch')]);

        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id_batch)
    {
        BatchObat::where(['id'=> $id_batch ])->update(['kode_batch'=>$request->input('kode_batch')]);
        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function destroy($id_batch)
    {
        $batch = BatchObat::find($id_batch);
        if (!$batch) return redirect()->back()->with('error_message', 'Data tidak ditemukan');
        $batch->delete();

        return redirect()->back()->with('success_message', 'Data berhasil dihapus');
    }
}
