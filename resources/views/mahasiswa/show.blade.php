@extends('layout.app')
@section('judul', 'Detail Mahasiswa - ' . $mahasiswa->nama)
@section('konten')
    <h1>Detail Mahasiswa</h1>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>Prodi:</strong> {{ $mahasiswa->prodi }}</p>
    <a href="{{ route('mahasiswa.index') }}">&laquo; Kembali</a>
@endsection