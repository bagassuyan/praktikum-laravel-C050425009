@extends('layout.app')
@section('judul', 'Edit Mata Kuliah')
@section('konten')
    <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="kode_mk" value="{{ $mk->kode_mk }}" required>
    <input type="text" name="nama_mk" value="{{ $mk->nama_mk }}" required>
    <input type="number" name="sks" value="{{ $mk->sks }}" required>
    <button type="submit">Update</button>
</form>
@endsection