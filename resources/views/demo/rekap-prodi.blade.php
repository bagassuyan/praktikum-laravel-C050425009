<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Mahasiswa Per Prodi</title>
</head>
<body>

    <h2>Rekap Jumlah Mahasiswa Per Program Studi</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Program Studi</th>
                <th>Jumlah Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->prodi }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>