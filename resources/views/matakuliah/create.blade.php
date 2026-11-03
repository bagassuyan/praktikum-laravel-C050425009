@extends('layout.app')
@section('judul', 'Buat Mata Kuliah')
@section('konten')
    <form action="{{ route('matakuliah.store') }}" method="POST">
    @csrf
    <input type="text" name="kode_mk" placeholder="Kode MK" required>
    <input type="text" name="nama_mk" placeholder="Nama MK" required>
    <input type="number" name="sks" placeholder="SKS" required>
    <button type="submit">Simpan</button>
</form>
@endsection