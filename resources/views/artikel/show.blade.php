@extends('layout.app')
@section('konten')
<h1>{{ $artikel->judul }}</h1>
<small>Oleh {{ $artikel->penulis->name }} | {{ $artikel->created_at->format('d M Y') }} | {{ $artikel->status }}</small>
<p>{{ $artikel->isi }}</p>
<a href="{{ route('artikel.index') }}">&larr; Kembali</a>
@endsection