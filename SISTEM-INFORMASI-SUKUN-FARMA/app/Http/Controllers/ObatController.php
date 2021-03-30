<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditObat;
use App\Http\Requests\TambahObat;
use App\Model\Kategori;
use App\Model\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload['obat'] = Obat::with('kategori')->get();
        return view('obat/index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payload['kategori'] = Kategori::all();
        return view('obat/tambah', $payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahObat $request)
    {
        $input = $request->validated();

        $obat = new Obat();
        $obat->kode_obat = $input['kode_obat'];
        $obat->nama = $input['nama'];
        $obat->harga_jual = $input['harga_jual'];
        $obat->kategori_id = $input['kategori'];
        $obat->save();

        return redirect('obat')->with('success_message', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payload['obat'] = Obat::with(['kategori', 'batchObat', 'detailObat'])->where('id', $id)->first();
        if (!$payload['obat']) return redirect('obat')->with('error_message', 'Obat tidak ditemukan');

        return view('obat/detail', $payload);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payload['kategori'] = Kategori::all();
        $payload['obat'] = Obat::find($id);
        if (!$payload['obat']) return redirect('obat')->with('error_message', 'Obat tidak ditemukan');

        return view('obat/edit', $payload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditObat $request, $id)
    {
        $input = $request->validated();

        $obat = Obat::find($id);
        $obat->kode_obat = $input['kode_obat'];
        $obat->nama = $input['nama'];
        $obat->harga_jual = $input['harga_jual'];
        $obat->kategori_id = $input['kategori'];
        $obat->save();

        return redirect('obat')->with('success_message', 'Obat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        if (!$obat) return redirect('obat')->with('error_message', 'Obat tidak ditemukan');
        $obat->delete();

        return redirect('obat')->with('success_message', 'Obat berhasil dihapus');
    }
}
