<?php

namespace App\Http\Controllers;

use App\Model\Resep;
use App\Model\Obat;
use App\model\ObatResep;
use App\Model\SatuanObat;
use Illuminate\Http\Request;


class ObatResepController extends Controller
{
    public function prosesTambah(Request $request, $resep_id)
    {
        $obatId = $request->input('nama');
        $satuanObatId = $request->input('satuan');
        $qty = $request->input('qty');

        $resep = Resep::find($resep_id);
        $resep->obat()->attach($obatId, [
            "satuan_obat_id" => $satuanObatId,
            "qty" => $qty
        ]);

        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $resep_id, $obat_id )
    {
        $resep = Resep::find($resep_id);
        $resep->obat()->updateExistingPivot($obat_id, [
            "satuan_obat_id" => $request->input('satuan'),
            "qty" => $request->input('qty')
        ]);

        return redirect('resep/'.$resep_id)->with('success_message', 'Data berhasil ditambahkan');
    }

    public function destroy($resep_id, $obat_id)
    {

        $resep = Resep::find($resep_id);
        $resep->obat()->detach($obat_id);

        return redirect('resep/'.$resep_id)->with('success_message', 'Data berhasil dihapus');
    }
}
