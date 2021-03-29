<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'obat'], function () {
    Route::get('/', 'ObatController@index');
    Route::get('/detailObat', 'ObatController@detailObat');
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', 'KategoriController@index');
});