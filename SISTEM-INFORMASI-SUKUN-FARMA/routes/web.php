<?php

use Illuminate\Support\Facades\Route;

//CRUD OBAT
Route::resource('obat', 'ObatController');

// CRUD KATEGORI
Route::get('kategori', 'KategoriController@index');
Route::post('kategori/action', 'KategoriController@store');
Route::match(['get', 'post'], 'kategori/action-edit{id}', 'KategoriController@update');
Route::delete('kategori/{id}', 'KategoriController@destroy');

//CRUD BATCH
Route::post('obat/{id}/batch', 'BatchController@prosesTambah');
Route::put('batch/{id_batch}', 'BatchController@prosesEdit');
Route::delete('batch/{id_batch}', 'BatchController@destroy');

//DETAIL
// Route::resource('obat.detail', 'DetailController')->shallow();
Route::get('obat/{id}/detail/create', 'DetailController@tambah');
Route::post('obat/{id}/detail', 'DetailController@prosesTambah');
Route::get('detail/{id_detail}/edit', 'DetailController@edit');
Route::put('detail/{id_detail}', 'DetailController@prosesEdit');
Route::delete('detail/{id_detail}', 'DetailController@destroy');

// RESEP
Route::resource('resep', 'ResepController');

//PENGELUARAN
Route::resource('pengeluaran', 'PengeluaranController');

// CRUD ROLE
Route::get('role', 'RoleController@index');
Route::post('role/action/tambah', 'RoleController@prosesTambah');
Route::put('role/action-edit/{id}', 'RoleController@prosesEdit');
Route::delete('role/{id}', 'RoleController@destroy');
