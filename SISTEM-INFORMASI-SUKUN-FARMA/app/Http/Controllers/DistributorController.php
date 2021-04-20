<?php

namespace App\Http\Controllers;

use App\Model\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DistributorController extends Controller
{
    public function index()
    {
        $payload['distributor'] = Distributor::all();
        return view('distributor/index', $payload);
    }

    public function prosesTambah(Request $request)
    {
        Distributor::create($request->all());
        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id)
    {
        Distributor::where(['id'=> $id ])->update([
            'nama_distributor'=>$request->input('nama_distributor'), 
            'alamat_distributor'=>$request->input('alamat_distributor')
        ]);
        return redirect()->back()->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $distributor = Distributor::find($id);
        if (!$distributor) return redirect('distributor')->with('error_message', 'Obat tidak ditemukan');
        $distributor->delete();

        return redirect('distributor')->with('success_message', 'Data berhasil dihapus');
    }
}
