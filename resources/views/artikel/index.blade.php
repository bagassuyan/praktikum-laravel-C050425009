@extends('layout.app')
@section('konten')
<h1>Daftar Artikel</h1>
<a href="{{ route('artikel.create') }}">+ Tambah Artikel</a>

<table border="1" cellpadding="6" style="margin-top:10px;">
    <tr><th>Judul</th><th>Penulis</th><th>Status</th><th>Aksi</th></tr>
    @forelse ($artikel as $a)
    <tr>
        <td>{{ $a->judul }}</td>
        <td>{{ $a->penulis->name }}</td>
        <td>{{ $a->status }}</td>
        <td>
            <a href="{{ route('artikel.show', $a->id) }}">Lihat</a> |
            <a href="{{ route('artikel.edit', $a->id) }}">Edit</a> |
            <form action="{{ route('artikel.destroy', $a->id) }}" method="POST"
                  style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="4">Belum ada artikel.</td></tr>
    @endforelse
</table>

{{ $artikel->links() }}
@endsection