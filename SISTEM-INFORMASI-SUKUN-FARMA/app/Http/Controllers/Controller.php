<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create() {
        // table user, column : username, password, role;
        $user = new User();
        $user->username = "Firhan";
        $user->password = "DindaCantik123";
        $user->role = 1;
        $user->save();

        // contoh update, mau ngerubah username user dengan id 3
        $user = User::find(3); // User::where('id', 3)
        $user->username = "Usernamebaru";
        $user->save();

        // contoh delete 
        $user = User::find(3);
        $user->delete();

        // mengambil semua data user beserta rolenya
        // eager loading dan lazy loading
        
        // eager loading :  meski user 5, hanya melakukan 2x query, query pertama mengambil data user, query kedua mengambil data role
        $user = User::with('role')->get();
        /* user = 
            username = "firhan"
            password = "dindacantik123"
            role_id = 1
            role = id = 1, nama = admin
        */
        
        // lazy loading : user ada 5, 6 query
        $users = User::get();  // 1 query mengambil data user
        foreach ($users as $user) {
            $role = $user->role; // 1 x 5 mengambil data role
        }

        // foreach itu contoh

        $users = [
            [
                "nama" => "firhan",
                "umur" => "20"
            ],
            [
                "nama" => "dinda",
                "umur" => "20"
            ]
        ];

        // foreach ( nama_variabel as inisial )
        // foreach adalah looping sama dengan for cuman lebih sederhana dalam penulisan
        foreach($users as $user) {
            echo "Nama saya " + $user['name'];
            // nama saya firhan
            // nama saya dinda
        }

        // foreach dalam for : 
        for ($i = 0; $i < sizeof($users); $i++) {
            echo "Nama saya " + $user[i]['name'];
            // nama saya firhan
            // nama saya dinda
        }
    }
}
