<?php

use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('login', 'AuthController@index');
Route::post('login', 'AuthController@prosesLogin');

Route::middleware(['check.login'])->group(function () {

    // Dashboard
    Route::get('/', 'DashboardController@index');

    // Kasir
    Route::get('/kasir', 'KasirController@index');
    Route::get('/kasir/invoice', 'KasirController@invoice');
    Route::get('/kasir/obat/{id}', 'KasirController@detailObat');

    Route::middleware(['check.role:Superadmin,Kasir'])->group(function () {
        // CRUD RESEP
        Route::resource('resep', 'ResepController');
    });
    
    Route::middleware(['check.role:Superadmin'])->group(function () {
        //CRUD USER
        Route::resource('user', 'UserController');

        //CRUD PENGELUARAN
        Route::resource('riwayat-pengeluaran', 'PengeluaranController');

        //LABA-RUGI
        Route::get('laba-rugi', 'LabaRugiController@index');

        //PENJUALAN
        Route::get('riwayat-penjualan', 'PenjualanController@index');
    });

    Route::middleware(['check.role:Superadmin,Admin'])->group(function () {
        //CRUD OBAT
        Route::resource('obat', 'ObatController');
        
        //CRUD DETAIL
        Route::get('obat/{id}/detail/create', 'DetailController@tambah');
        Route::post('obat/{id}/detail', 'DetailController@prosesTambah');
        Route::get('detail/{id_detail}/edit', 'DetailController@edit');
        Route::put('detail/{id_detail}', 'DetailController@prosesEdit');
        Route::delete('detail/{id_detail}', 'DetailController@destroy');
        
        //CRUD BATCH
        Route::post('obat/{id}/batch', 'BatchController@prosesTambah');
        Route::put('batch/{id_batch}', 'BatchController@prosesEdit');
        Route::delete('batch/{id_batch}', 'BatchController@destroy');

        // CRUD KATEGORI
        Route::get('kategori', 'KategoriController@index');
        Route::post('kategori/action', 'KategoriController@store');
        Route::match(['get', 'post'], 'kategori/action-edit{id}', 'KategoriController@update');
        Route::delete('kategori/{id}', 'KategoriController@destroy');
        
        // CRUD ROLE
        Route::get('role', 'RoleController@index');
        Route::post('role/action/tambah', 'RoleController@prosesTambah');
        Route::put('role/action-edit/{id}', 'RoleController@prosesEdit');
        Route::delete('role/{id}', 'RoleController@destroy');
        
        // CRUD SATUAN
        Route::get('satuan', 'SatuanController@index');
        Route::post('satuan/action/tambah', 'SatuanController@prosesTambah');
        Route::put('satuan/action-edit/{id}', 'SatuanController@prosesEdit');
        Route::delete('satuan/{id}', 'SatuanController@destroy');
    
        
        // CRUD DISTRIBUTOR
        Route::get('distributor', 'DistributorController@index');
        Route::post('distributor/action/tambah', 'DistributorController@prosesTambah');
        Route::put('distributor/action-edit/{id}', 'DistributorController@prosesEdit');
        Route::delete('distributor/{id}', 'DistributorController@destroy');
        
        // CRUD KOMPARASI SATUAN
        Route::get('komparasi', 'KomparasiController@index');
        Route::post('komparasi/action/tambah', 'KomparasiController@prosesTambah');
        Route::put('komparasi/action-edit/{id}', 'KomparasiController@prosesEdit');
        Route::delete('komparasi/{id}', 'KomparasiController@destroy');
    
        // CRUD JENIS PENGELUARAN
        Route::get('jenis-pengeluaran', 'JenisPengeluaranController@index');
        Route::post('jenis-pengeluaran/action/tambah', 'JenisPengeluaranController@prosesTambah');
        Route::put('jenis-pengeluaran/action-edit/{id}', 'JenisPengeluaranController@prosesEdit');
        Route::delete('jenis-pengeluaran/{id}', 'JenisPengeluaranController@destroy');
    });

    //CRUD ObatResep
    Route::post('resep/{resep_id}/obat', 'ObatResepController@prosesTambah');
    Route::put('resep/{resep_id}/obat/{obat_id}/edit', 'ObatResepController@prosesEdit');
    Route::delete('resep/{resep_id}/obat/{obat_id}', 'ObatResepController@destroy');

});


