@extends('layout.app')
@section('judul', 'Detail Mata Kuliah - ' . $mk['nama'])
@section('konten')
    <nav>
        <a href="{{ route('mahasiswa.index') }}">Daftar Mahasiswa</a> | 
        <a href="{{ route('matakuliah.index') }}">Daftar Mata Kuliah</a>
    </nav>
    <hr>

    <h1>Detail Mata Kuliah</h1>
    <p><strong>Kode:</strong> {{ $mk['kode'] }}</p>
    <p><strong>Nama Mata Kuliah:</strong> {{ $mk['nama'] }}</p>
    <p><strong>SKS:</strong> {{ $mk['sks'] }}</p>
    <p><strong>Dosen Pengampu:</strong> {{ $mk['dosen'] }}</p>

    <a href="{{ route('matakuliah.index') }}">← Kembali ke Daftar Mata Kuliah</a>
@endsection