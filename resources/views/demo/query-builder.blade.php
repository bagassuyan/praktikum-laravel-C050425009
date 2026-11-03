<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - Pagination</title>
</head>
<body>

    <h2>Daftar Mahasiswa</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $mhs)
                <tr>
                    <td>{{ $mhs->id }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->semester }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tautan Navigasi Pagination -->
    <div style="margin-top: 15px;">
        {{ $data->links() }}
    </div>

</body>
</html>