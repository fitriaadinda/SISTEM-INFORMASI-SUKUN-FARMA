<?php

namespace App\Http\Controllers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    /*
    1. ambil data dari database sesuai email
    2. cocokan password dengan yang di ambil
    3. jika benar tambahkan sesi, telah login, nama, dan role, dan id
    4. arahkan ke halaman awal
    */

    public function prosesLogin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        // ambil 1 user yang memiliki email $email
        $user = User::with('role')->where('email', $email)->first();
        if (!$user) return redirect()->back()->with('error_message', 'User tidak ditemukan');
        
        if (!Hash::check($password, $user->password)) return redirect()->back()->with('error_message', 'Password user tidak sesuai');

        session([
            'is_logged_in' => true,
            'id_logged_in' => $user->id,
            'nama' => $user->nama,
            'role' => $user->role->nama
        ]);

        return redirect('/')->with('success_message', 'Anda berhasil login');
    }
}
