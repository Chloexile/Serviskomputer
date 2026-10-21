<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>


<body>
<h1>Edit User</h1>
    <form method='post' action='/edit/{{$user->id}}'>
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" value="{{$user->username}}" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{$user->email}}" required>
        <br><br>
        <button type="submit">Save Changes</button>
</fomr>
</body>
</html>