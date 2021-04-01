<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahKategori;
use App\Model\Kategori;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    public function index()
    {
        $payload['kategori'] = Kategori::all();
        return view('kategori/index', $payload);
    }

    public function create()
    {
        return view('kategori/index');
    }

    public function store(TambahKategori $request)
    {
        // $input = $request->validated();

        Kategori::create($request->all());
        // $kategori = new Kategori();
        // $kategori->nama = $input['nama'];
        // $kategori->save();

        return redirect()->back()->with('success_message', 'Kategori berhasil ditambahkan');
    }

    public function edit(Request $request, $id){
        $payload['kategori'] = Kategori::find($id);
        if (!$payload['kategori']) return redirect()->back()->with('error_message', 'Obat tidak ditemukan');

        return view('kategori/index', $payload);
    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $kategori = $request->all();
        }

        Kategori::where(['id'=>$id])->update(['nama'=>$kategori['nama']]);
        return redirect()->back()->with('success_message','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) return redirect('kategori')->with('error_message', 'Obat tidak ditemukan');
        $kategori->delete();

        return redirect('kategori')->with('success_message', 'Data berhasil dihapus');
    }
}
