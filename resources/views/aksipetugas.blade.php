<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <h1>Welcome {{session('username')}}!</h1>

   <table border="1" width="400">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Nama Petugas</th>
        <th>Level</th>
        <th>Aksi</th>
</tr>

<?php $no=1;
    foreach ($users as $user){
?> <tr>
    <td><?= $no++ ?></td>
    <td><?= $user->username ?></td>
    <td><?= $user->email ?></td>
    <td><?= $user->email ?></td>
    
    <button><a href='/edit/<?= $user->id ?>'>Edit</a></button>
    <button><a href='/delete/<?= $user->id ?>' method='post'>Delete</a></button>
    @csrf
    </td>
</tr>

<?php

}

?>

    <a href="/logout"><button>Logout</button></a>
</body>
</html>