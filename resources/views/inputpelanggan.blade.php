<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pelanggan Baru</title>
</head>
<body>
    <h1>Form Tambah Pelanggan</h1>

    <form action="/aksipelanggan" method="POST">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>

        <label>No HP / Telepon:</label><br>
        <input type="text" name="no_telepon" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <button type="submit">Simpan Pelanggan</button>
    </form>
    
    <br>
    <a href="/pelanggan">Kembali ke Data Pelanggan</a>
</body>
</html>