<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile-pic">
        <img src="{{ asset('assets/img/PP.jpeg') }}" alt="Foto Profil">
        </div>
        <div class="info-box">
            <div class="box">
                <input type="text" id= nama value=" {{ $nama }}">
            </div>
            <div class="box">
                <input type="text" id= kelas value=" {{ $nama_kelas ?? 'kelas tidak ditemukan' }}">
            </div>
            <div class="box">
                <input type="text" id= npm value=" {{ $npm }}">
            </div>
        </div>
    </div>
</body>

</html>