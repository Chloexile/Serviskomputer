<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
</head>
<body>
    <h1>Daftar Data Petugas</h1>
    
    <a href="/inputpetugas">+ Tambah Pelanggan Baru</a>
    <a href="/homepage">Kembali ke Homepage</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Petugas</th>
                <th>Jenis Kelamin</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petugas as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->username }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->nama_petugas }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->level }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>