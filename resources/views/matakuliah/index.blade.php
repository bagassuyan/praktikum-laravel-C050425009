@extends('layout.app')
@section('judul', 'Daftar Mata Kuliah')
@section('konten')
    <h2>Daftar Mata Kuliah</h2>

    <!-- Pesan Sukses Notification -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Tombol Tambah Data -->
    <a href="{{ route('matakuliah.create') }}">
        <button type="button">+ Tambah Mata Kuliah</button>
    </a>

    <br><br>

    <!-- Tabel Daftar Mata Kuliah -->
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matakuliah as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_mk }}</td>
                    <td>{{ $item->nama_mk }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $item->id) }}">Detail</a> | 
                        <a href="{{ route('matakuliah.edit', $item->id) }}">Edit</a> | 
                        <form action="{{ route('matakuliah.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Data mata kuliah belum ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection