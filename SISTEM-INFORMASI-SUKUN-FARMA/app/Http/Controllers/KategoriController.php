<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class KategoriController extends Controller {

    public function index() {
        return view('kategori/index');
    }

}
