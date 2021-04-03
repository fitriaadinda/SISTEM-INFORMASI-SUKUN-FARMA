<?php

namespace App\Http\Controllers;

use App\Model\Obat;
use App\Model\BatchObat;
use App\Model\ObatDetail;
use App\Http\Requests\EditDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah($id)
    {
        $payload['obat'] = Obat::with('batchObat')->where('id', $id)->first();
        return view('obat/detail/tambah', $payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prosesTambah(TambahDetail $request, $id)
    {
        $input = $request->validated();
        // /
        $batch = Obat::find($id);
        $batch->detailObat()->create([
            'waktu_expired' => $input['waktu_expired'],
            'batch_id' => $input['kode_batch'],
            'harga_beli' => $input['harga_beli'],
            'stock' => $input['stock']
        ]);

        return redirect('obat/'.$id)->with('success_message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_detail)
    {
        $payload['batch'] = BatchObat::all();
        $payload['detail'] = ObatDetail::with('obat')->where('id', $id_detail)->first();
        // if (!$payload['detail']) return redirect('detail')->with('error_message', 'Data tidak ditemukan');

        return view('obat/detail/edit', $payload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function prosesEdit(EditDetail $request, $id_detail)
    {
        $input = $request->validated();
        
        $obatDetail = ObatDetail::with('obat')->where(['id'=> $id_detail ])->first();
        $obatDetail->waktu_expired = $input['waktu_expired'];
        $obatDetail->batch_id = $input['kode_batch'];
        $obatDetail->harga_beli = $input['harga_beli'];
        $obatDetail->stock = $input['stock'];
        $obatDetail->save();

        // dd($obatDetail->obat->id);
        return redirect('obat/'.$obatDetail->obat->id)->with('success_message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_detail)
    {
        $detail = ObatDetail::find($id_detail);
        if (!$detail) return redirect()->back()->with('error_message', 'Data tidak ditemukan');
        $de->delete();

        return redirect()->back()->with('success_message', 'Data berhasil dihapus');
    }
}
