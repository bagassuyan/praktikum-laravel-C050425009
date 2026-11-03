@extends('layout.app')
@section('konten')
<h1>Tambah Artikel</h1>

{{-- Ringkasan semua error --}}
@if ($errors->any())
    <div style="background:#fee2e2; padding:10px; margin-bottom:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('artikel.store') }}" method="POST">
    @csrf

    <input type="text" name="judul" placeholder="Judul Artikel" value="{{ old('judul') }}">
    @error('judul')
        <small style="color:red;">{{ $message }}</small>
    @enderror
    <br>

    <textarea name="isi" placeholder="Isi Artikel">{{ old('isi') }}</textarea>
    @error('isi')
        <small style="color:red;">{{ $message }}</small>
    @enderror
    <br>

    <select name="status">
        <option value="draft" @selected(old('status') == 'draft')>Draft</option>
        <option value="terbit" @selected(old('status') == 'terbit')>Terbit</option>
    </select>
    @error('status')
        <small style="color:red;">{{ $message }}</small>
    @enderror
    <br>

    <button type="submit">Simpan</button>
</form>
@endsection