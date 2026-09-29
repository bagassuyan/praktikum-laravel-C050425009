<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-rute-baru', function () {
    return 'Rute baru berhasil ditambahkan!';
});