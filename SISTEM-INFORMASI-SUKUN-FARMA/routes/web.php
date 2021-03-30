<?php

use Illuminate\Support\Facades\Route;

Route::resource('obat', 'ObatController');
// Route::resource('obat.batch', 'BatchController')->shallow();

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', 'KategoriController@index');
});