@extends('layout.app')
@section('konten')
<h1>Daftar</h1>
@if ($errors->any())
    <div style="background:#fee2e2; padding:10px;">
        <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif
<form action="{{ route('register.post') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}"><br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="password_confirmation" placeholder="Ulangi Password"><br>
    <button type="submit">Daftar</button>
</form>
@endsection