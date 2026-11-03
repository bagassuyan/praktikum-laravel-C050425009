<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\MNilaiatakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index() {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create() {
        return view('matakuliah.create');
    }

    public function store(Request $request) {
        $request->validate(['kode_mk' => 'required', 'nama_mk' => 'required', 'sks' => 'required|numeric']);
        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index');
    }

    public function edit($id) {
        $mk = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('mk'));
    }

    public function update(Request $request, $id) {
        $request->validate(['kode_mk' => 'required', 'nama_mk' => 'required', 'sks' => 'required|numeric']);
        Matakuliah::findOrFail($id)->update($request->all());
        return redirect()->route('matakuliah.index');
    }

    public function destroy($id) {
        Matakuliah::findOrFail($id)->delete();
        return redirect()->route('matakuliah.index');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('NilaiMatakuliah.mataNkuliah'); // Memuat relasi nilai & matakuliah
        return view('mahasiswa.show', compact('mahasiswa.show'));
    }
}