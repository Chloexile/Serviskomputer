<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Petugas Baru</title>
</head>
<body>
    <h1>Form Tambah Petugas Baru</h1>
    
    <a href="/petugas">Kembali ke Data Petugas</a>
    <br><br>

    <form action="/aksipetugas" method="POST">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Nama Petugas:</label><br>
        <input type="text" name="nama_petugas" required><br><br>

        <label>Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <select name="level" required>
            <option value="">-- Jabatan --</option>
            <option value="Teknisi">Teknisi</option>
            <option value="Kasir">Kasir</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
        </select><br><br>

        <button type="submit">Simpan Petugas</button>
    </form>
</body>
</html>