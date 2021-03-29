<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ObatController extends Controller {

    public function index() {
        return view('obat/index');
    }

    public function detailObat() {
        return view('obat/DetailObat');
    }

}
