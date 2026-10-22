<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

    <h1>Welcome to the dashboard <?= session('username') ?></h1>

 <form action="/home" method="GET">
    <label>Dari Tanggal:</label>
    <input type="date" name="tgl_awal" value="<?= request('tgl_awal') ?>">

    <label>Sampai Tanggal:</label>
    <input type="date" name="tgl_akhir" value="<?= request('tgl_akhir') ?>">

    <button type="submit">Filter</button>
    <a href="/homepage"><button type="button">Reset</button></a>
</form>

    <br>

    <button onClick="window.print()">Print window</button>
    <a href="{{ url('/excel') }}"><button type="button">Export to Excel</button></a>
    <a href="{{ url('/pdf') }}"><button type="button">Export to PDF</button></a>

    <table border="1" width="500">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Tanggal Dibuat</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php $no = 1;
        foreach ($users as $user) {
        ?> 
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>
            <td><?= date('d-m-Y', strtotime($user->created_at)) ?></td>
            <td>
                <button><a href='/edit/<?= $user->id ?>'>Edit</a></button>
            </td>
            <td>
                <button><a href='/delete/<?= $user->id ?>'>Delete</a></button>
            </td>

        </tr>
        <?php
        }
        ?>
    </table>
        
    <a href="/petugas">Lihat Data Petugas</a>

    <a href="/pelanggan">Lihat Data Pelanggan</a>
        <a href="/logout"><button>Logout</button></a>

    <br><br>
</body>
</html>