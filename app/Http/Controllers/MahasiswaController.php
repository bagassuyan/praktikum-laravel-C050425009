<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\MNilaiatakuliah;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('nilaiMatakuliahs.matakuliah');
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function create() 
    { 
        return 'create: form tambah mahasiswa'; 
    }

    public function store(Request $request) 
    {
        // Lakukan validasi jika diperlukan, lalu simpan data
        Mahasiswa::create($request->only(['nim', 'nama', 'email', 'prodi', 'semester']));
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->only(['nim', 'nama', 'email', 'prodi', 'semester']));
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil dihapus');
    }
    
    public function cariMahasiswa(Request $request)
    {
        $nama = $request->query('nama');

        if ($nama) {
            return "Hasil pencarian mahasiswa dengan kata kunci: " . $nama;
        }

        return "Silakan masukkan kata kunci pencarian.";
    }

    public function bandingkanQuery()
    {
    // 1. Tanpa Eager Loading (10 data)
    DB::flushQueryLog();
    DB::enableQueryLog();

    $mahasiswaTanpa = Mahasiswa::take(10)->get();
    foreach ($mahasiswaTanpa as $m) {
        $m->nilai; // Memicu query relasi terpisah untuk setiap mahasiswa
    }
    $logTanpa = DB::getQueryLog();

    // 2. Dengan Eager Loading (10 data)
    DB::flushQueryLog();
    DB::enableQueryLog();

    $mahasiswaDengan = Mahasiswa::with('NilaiMatakuliahs')->take(10)->get();
    foreach ($mahasiswaDengan as $m) {
        $m->nilai; // Data relasi sudah diambil di awal
    }
    $logDengan = DB::getQueryLog();

    // Tampilkan hasil untuk di-screenshot
    dd([
        'TANPA Eager Loading' => [
            'Jumlah Query' => count($logTanpa),
            'Detail Query' => $logTanpa,
        ],
        'DENGAN Eager Loading (with)' => [
            'Jumlah Query' => count($logDengan),
            'Detail Query' => $logDengan,
        ],
    ]);
}
}   

