<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'obat'], function () {
    Route::get('/', 'ObatController@index');
});