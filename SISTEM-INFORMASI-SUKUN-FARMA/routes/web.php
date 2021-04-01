<?php

use Illuminate\Support\Facades\Route;

Route::resource('obat', 'ObatController');
Route::get('kategori', 'KategoriController@index');
Route::post('kategori/action', 'KategoriController@store');
Route::match(['get', 'post'], 'kategori/action-edit{id}', 'KategoriController@update');
Route::delete('kategori/{id}', 'KategoriController@destroy');
Route::resource('obat.detail', 'DetailController')->shallow();
// Route::get('obat/{id}/detail/create', 'DetailController');
// Route::post('obat/{id}/detail', 'DetailController');

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', 'KategoriController@index');
});