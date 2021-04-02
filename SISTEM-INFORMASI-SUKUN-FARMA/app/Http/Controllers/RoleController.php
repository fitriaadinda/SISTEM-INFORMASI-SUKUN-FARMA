<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index()
    {
        $payload['role'] = Role::all();
        return view('role/index', $payload);
    }

    public function prosesTambah(Request $request)
    {
        Role::create($request->all());
        return redirect()->back()->with('success_message', 'Data berhasil ditambahkan');
    }

    public function prosesEdit(Request $request, $id)
    {
        Role::where(['id'=> $id ])->update(['nama'=>$request->input('nama')]);
        return redirect()->back()->with('success_message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) return redirect('role')->with('error_message', 'Obat tidak ditemukan');
        $role->delete();

        return redirect('role')->with('success_message', 'Data berhasil dihapus');
    }
}
