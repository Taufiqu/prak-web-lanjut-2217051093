<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/create_user.css')}}">

    <title>Create User</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label>Nama</label>
        <input type="text" name="Nama" value="">
        <br>
        <label>Kelas</label>
        <input type="text" name="Kelas" value="">
        <br>
        <label>NPM</label>
        <input type="text" name="NPM" value="">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
