<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPengeluaran;
use App\Http\Requests\TambahPengeluaran;
use App\Model\JenisPengeluaran;
use App\Model\Pengeluaran;
use App\Model\User;
use Illuminate\Http\Request;


class PengeluaranController extends Controller
{
    public function index()
    {
        $payload['pengeluaran'] = Pengeluaran::with('jenisPengeluaran')->get();
        return view('pengeluaran/index', $payload);
    }

    public function create()
    {
        $payload['jenis'] = JenisPengeluaran::all();
        return view('pengeluaran/tambah', $payload);
    }

    public function store(TambahPengeluaran $request)
    {
        $input = $request->validated();

        $pengeluaran = new Pengeluaran();
        $pengeluaran->jenis_pengeluaran_id = $input['jenis_pengeluaran'];
        $pengeluaran->keterangan = $input['keterangan'];
        $pengeluaran->waktu_pengeluaran = $input['waktu_pengeluaran'];
        $pengeluaran->jumlah_pengeluaran = $input['jumlah'];
        $pengeluaran->save();

        return redirect('riwayat-pengeluaran')->with('success_message', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, $id){
        $payload['jenis'] = JenisPengeluaran::all();
        $payload['pengeluaran'] = Pengeluaran::find($id);
        if (!$payload['pengeluaran']) return redirect('pengeluaran')->with('error_message', 'Data tidak ditemukan');

        return view('pengeluaran/edit', $payload);
    }

    public function update(EditPengeluaran $request, $id)
    {
        $input = $request->validated();

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->jenis_pengeluaran_id = $input['jenis_pengeluaran'];
        $pengeluaran->keterangan = $input['keterangan'];
        $pengeluaran->waktu_pengeluaran = $input['waktu_pengeluaran'];
        $pengeluaran->jumlah_pengeluaran = $input['jumlah'];
        $pengeluaran->save();

        return redirect('riwayat-pengeluaran')->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        if (!$pengeluaran) return redirect('pengeluaran')->with('error_message', 'Data tidak ditemukan');
        $pengeluaran->delete();

        return redirect('riwayat-pengeluaran')->with('success_message', 'Data berhasil dihapus');
    }
}
