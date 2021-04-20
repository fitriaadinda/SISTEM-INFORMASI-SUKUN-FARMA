<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUser;
use App\Http\Requests\TambahUser;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload['user'] = User::with('role')->get();
        return view('user/index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payload['role'] = Role::all();
        return view('user/tambah', $payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TambahUser $request)
    {
        $input = $request->validated();

        $user = new User();
        $user->nama = $input['nama'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->no_hp = $input['no_hp'];
        $user->alamat = $input['alamat'];
        $user->role_id = $input['role'];
        $user->save();

        return redirect('user')->with('success_message', 'Data berhasil ditambahkan');
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
    public function edit($id)
    {
        $payload['role'] = Role::all();
        $payload['user'] = User::find($id);
        if (!$payload['user']) return redirect('user')->with('error_message', 'Data tidak ditemukan');

        return view('user/edit', $payload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, $id)
    {
        $input = $request->validated();

        $user = User::find($id);
        $user->nama = $input['nama'];
        $user->email = $input['email'];
        $user->password = $input['password'] ? Hash::make($input['password']) : $user->password;
        $user->no_hp = $input['no_hp'];
        $user->alamat = $input['alamat'];
        $user->role_id = $input['role'];
        $user->save();

        return redirect('user')->with('success_message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return redirect('user')->with('error_message', 'Data tidak ditemukan');
        $user->delete();

        return redirect('user')->with('success_message', 'Data berhasil dihapus');
    }
}
