<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//middleware-------------------------------------------------------------------------------------------
Route::get('/login-admin', 'Admin\AuthController@loginForm')->name('adminLogin');
Route::get('/login-sekertaris', 'Sekertaris\AuthController@loginForm')->name('sekertarisLogin');
Route::get('/login-owner', 'Owner\AuthController@loginForm')->name('ownerLogin');

//admin------------------------------------------------------------------------------------------------
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('admin', 'Admin\AuthController@cekLogin')->name('admin');
    Route::post('sekertaris', 'Sekertaris\AuthController@cekLogin')->name('sekertaris');
    Route::post('owner', 'Owner\AuthController@cekLogin')->name('owner');
});



Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('logout', 'Admin\AuthController@logout')->name('logout');

    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', 'Admin\KategoriController@index')->name('index');
        Route::get('/tambah', 'Admin\KategoriController@create')->name('create');
        Route::post('/', 'Admin\KategoriController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\KategoriController@edit')->name('edit');
        Route::patch('/update/{id}', 'Admin\KategoriController@update')->name('update');
        Route::delete('/delete/{id}', 'Admin\KategoriController@destroy')->name('destroy');
    });

    Route::prefix('suplier')->name('suplier.')->group(function () {
        Route::get('/', 'Admin\SuplierController@index')->name('index');
        Route::get('/tambah', 'Admin\SuplierController@create')->name('create');
        Route::post('/', 'Admin\SuplierController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SuplierController@edit')->name('edit');
        Route::patch('/update/{id}', 'Admin\SuplierController@update')->name('update');
        Route::delete('/delete/{id}', 'Admin\SuplierController@destroy')->name('destroy');
    });

    Route::prefix('material')->name('material.')->group(function () {
        Route::get('/', 'Admin\MaterialController@index')->name('index');
        Route::get('/tambah', 'Admin\MaterialController@create')->name('create');
        Route::post('/', 'Admin\MaterialController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\MaterialController@edit')->name('edit');
        Route::patch('/update/{id}', 'Admin\MaterialController@update')->name('update');
        Route::delete('/delete/{id}', 'Admin\MaterialController@destroy')->name('destroy');
    });

});

//------------------------------------Sekertaris----------------------------------------------------------------

Route::middleware(['auth.sekertaris'])->prefix('sekertaris')->name('sekertaris.')->group(function () {
    Route::get('/', 'Sekertaris\DashboardController@index')->name('dashboard');
    Route::post('logout', 'Sekertaris\AuthController@logout')->name('logout');

    Route::prefix('materialmasuk')->name('materialmasuk.')->group(function () {
        Route::get('/', 'Sekertaris\MaterialMasukController@index')->name('index');
        Route::get('/tambah', 'Sekertaris\MaterialMasukController@create')->name('create');
        Route::post('/', 'Sekertaris\MaterialMasukController@store')->name('store');
        Route::get('/edit/{id}', 'Sekertaris\MaterialMasukController@edit')->name('edit');
        Route::patch('/update/{id}', 'Sekertaris\MaterialMasukController@update')->name('update');
        Route::delete('/delete/{id}', 'Sekertaris\MaterialMasukController@destroy')->name('destroy');
    });

    Route::prefix('materialkeluar')->name('materialkeluar.')->group(function () {
        Route::get('/', 'Sekertaris\MaterialKeluarController@index')->name('index');
        Route::get('/tambah', 'Sekertaris\MaterialkeluarController@create')->name('create');
        Route::post('/', 'Sekertaris\MaterialKeluarController@store')->name('store');
        Route::get('/edit/{id}', 'Sekertaris\MaterialKeluarController@edit')->name('edit');
        Route::patch('/update/{id}', 'Sekertaris\MaterialKeluarController@update')->name('update');
        Route::delete('/delete/{id}', 'Sekertaris\MaterialKeluarController@destroy')->name('destroy');
    });

    Route::prefix('cetakmaterialmasuk')->name('cetakmaterialmasuk.')->group(function () {
        Route::get('/cetak', 'Sekertaris\MaterialMasukController@cetakMaterialMasuk')->name('cetak');
    });

    Route::prefix('cetakmaterialkeluar')->name('cetakmaterialkeluar.')->group(function () {
        Route::get('/cetak', 'Sekertaris\MaterialKeluarController@cetakMaterialKeluar')->name('cetak');
    });
});

//------------------------------------Owner----------------------------------------------------------------
Route::middleware(['auth.owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/', 'Owner\DashboardController@index')->name('dashboard');
    Route::post('logout', 'Owner\AuthController@logout')->name('logout');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', 'Owner\AdminController@index')->name('index');
        Route::get('/tambah', 'Owner\AdminController@create')->name('create');
        Route::post('/', 'Owner\AdminController@store')->name('store');
        Route::get('/edit/{id}', 'Owner\AdminController@edit')->name('edit');
        Route::patch('/update/{id}', 'Owner\AdminController@update')->name('update');
        Route::delete('/delete/{id}', 'Owner\AdminController@destroy')->name('destroy');
    });

    Route::prefix('owner')->name('owner.')->group(function () {
        Route::get('/', 'Owner\OwnerController@index')->name('index');
        Route::get('/tambah', 'Owner\OwnerController@create')->name('create');
        Route::post('/', 'Owner\OwnerController@store')->name('store');
        Route::get('/edit/{id}', 'Owner\OwnerController@edit')->name('edit');
        Route::patch('/update/{id}', 'Owner\OwnerController@update')->name('update');
        Route::delete('/delete/{id}', 'Owner\OwnerController@destroy')->name('destroy');
    });

    Route::prefix('sekertaris')->name('sekertaris.')->group(function () {
        Route::get('/', 'Owner\SekertarisController@index')->name('index');
        Route::get('/tambah', 'Owner\SekertarisController@create')->name('create');
        Route::post('/', 'Owner\SekertarisController@store')->name('store');
        Route::get('/edit/{id}', 'Owner\SekertarisController@edit')->name('edit');
        Route::patch('/update/{id}', 'Owner\SekertarisController@update')->name('update');
        Route::delete('/delete/{id}', 'Owner\SekertarisController@destroy')->name('destroy');
    });

    Route::prefix('laporanmasuk')->name('laporanmasuk.')->group(function () {
        Route::get('/', 'Owner\LaporanController@laporanMasuk')->name('index');
        Route::get('/cetak', 'Owner\LaporanController@cetakLaporanMasuk')->name('cetak');
    });

    Route::prefix('laporankeluar')->name('laporankeluar.')->group(function () {
        Route::get('/', 'Owner\LaporanController@laporanKeluar')->name('index');
        Route::get('/cetak', 'Owner\LaporanController@cetakLaporanKeluar')->name('cetak');
    });
});
