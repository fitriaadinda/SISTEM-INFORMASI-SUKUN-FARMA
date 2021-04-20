<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditResep;
use App\Http\Requests\TambahResep;
use App\Model\Resep;
use App\Model\Obat;
use App\Model\SatuanObat;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload['resep'] = Resep::all();
        $payload['obat'] = Obat::all();
        $payload['satuan'] = SatuanObat::all();
        return view('resep/index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payload['obat'] = Obat::all();
        $payload['satuan'] = SatuanObat::all();
        return view('resep/tambah', $payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahResep $request)
    {
        $input = $request->validated();

        $resep = new Resep();
        $resep->no_rekam_medis = $input['no_rekam_medis'];
        $resep->nama_pasien = $input['nama_pasien'];
        $resep->no_telepon = $input['no_telepon'];
        $resep->alamat_pasien = $input['alamat'];
        $resep->nama_dokter = $input['nama_dokter'];
        $resep->nama_klinik = $input['nama_klinik'];
        $resep->save();

        // nama, satuan, qty,
        // nama, satuan_obat_id, qty
        /*
        [
            "2" => [
                "satuan_obat_id" => 1,
                "qty" => 10,
            ],
            "5" => [
                "satuan_obat_id" => 3,
                "qty" => 20
            ]
            "10 " => [
                "satuan_obat_id" => 2,
                "qty" => 5
            ]
        ]

        => = (associative array / array yang punya nama)
        */

        $obats = [];
        for ($i = 0; $i < count($input['nama']); $i++) {
            $obat_id = $input['nama'][$i];  // 2 5 10
            $satuan_obat_id = $input['satuan'][$i];  // 1 3 2
            $qty = $input['qty'][$i]; // 10 20 5

            $obats[$obat_id] = [
                "satuan_obat_id" => $satuan_obat_id,
                "qty" => $qty
            ];
        }

        $resep->obat()->attach($obats);
        
        return redirect('resep')->with('success_message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payload['satuan'] = SatuanObat::all();
        $payload['obat'] = Obat::all();
        $payload['resep'] = Resep::with('obat')->where('id', $id)->first();
        if (!$payload['resep']) return redirect('resep')->with('error_message', 'Data tidak ditemukan');

        return view('resep/detail', $payload);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payload['resep'] = Resep::find($id);
        if (!$payload['resep']) return redirect('resep')->with('error_message', 'Data tidak ditemukan');

        return view('resep/edit', $payload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditResep $request, $id)
    {
        $input = $request->validated();

        $resep = Resep::find($id);
        $resep->no_rekam_medis = $input['no_rekam_medis'];
        $resep->nama_pasien = $input['nama_pasien'];
        $resep->no_telepon = $input['no_telepon'];
        $resep->alamat_pasien = $input['alamat'];
        $resep->nama_dokter = $input['nama_dokter'];
        $resep->nama_klinik = $input['nama_klinik'];
        $resep->save();

        return redirect('resep')->with('success_message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep = Resep::find($id);
        if (!$resep) return redirect('resep')->with('error_message', 'Data tidak ditemukan');
        $resep->delete();

        return redirect('resep')->with('success_message', 'Data berhasil dihapus');
    }
}
