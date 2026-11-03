<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\HitungTotalSksController;
use App\Http\Controllers\QueryBuilderMhsTI;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-rute-baru', function () {
    return 'Rute baru berhasil ditambahkan!';
});

// Route::get('/mahasiswa/{mahasiswa}', function (Mahasiswa $mahasiswa) {
//     return $mahasiswa->nama; // otomatis mengambil data sesuai id pada URL
//     });
// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
// Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show'])
//     ->where('nim', '[0-9]+')
//     ->name('mahasiswa.show');
// Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa', function () {
    $mahasiswa = Mahasiswa::all(); // Mengambil semua data mahasiswa
    return view('mahasiswa.index', compact('mahasiswa'));
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    })->name('dashboard');
});

Route::prefix('akademik')->group(function () {
    Route::get('/mahasiswa', function () {
        return 'Halaman Mahasiswa';
    });

    Route::resource('matakuliah', MatakuliahController::class)->only(['index', 'show', 'create', 'store']);
});

// Route::fallback(function () {
//     return 'Halaman yang Anda cari tidak ditemukan.';
// });

Route::get('/sapa', function () {
    return view('sapa', ['nama' => 'Muhamamd Saidillah']);
});

Route::get('/profil', function () {
    return view('profil')
        ->with('nama', 'Muhammad Saidillah')
        ->with('nim', 'C050425042')
        ->with('prodi', 'Sistem Informasi Kota Cerdas');
});

Route::get('/statistik', function () {
    return view('akademik.statistik');
});

// Resource route hanya untuk index dan show
Route::resource('matakuliah', MataKuliahController::class)->only(['index', 'show']);
Route::resource('mahasiswa', MahasiswaController::class)->only(['index', 'show']);

Route::get('/latihan', [LatihanController::class, 'index']);

Route::get('/mahasiswa/cari', [MahasiswaController::class, 'cariMahasiswa'])->name('mahasiswa.cari');

Route::get('/matakuliah/total-sks', HitungTotalSksController::class);

// Route untuk menampilkan semua data / pagination (soal no 3)
Route::get('/query-builder', [QueryBuilderMhsTI::class, 'tampilkanSemua']);

// Route untuk filter mahasiswa TI semester 3-6 (soal no 1)
Route::get('/query-builder/filter', [QueryBuilderMhsTI::class, 'tampilkanFilter']);

// Route untuk rekap jumlah mahasiswa per prodi (soal no 2)
Route::get('/query-builder/rekap', [QueryBuilderMhsTI::class, 'rekapProdi']);

// Route untuk menampilkan form tambah data
Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');

// Route untuk menampilkan form edit data berdasarkan ID
Route::get('/matakuliah/{matakuliah}/edit', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');

// Route untuk menghapus data berdasarkan ID
Route::delete('/matakuliah/{matakuliah}', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');

Route::get('/uji-eager', [MahasiswaController::class, 'bandingkanQuery']);

Route::get('/', fn () => redirect()->route('artikel.index'));
Route::resource('artikel', ArtikelController::class);

Route::get('/register', [AuthController::class, 'formRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');