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
                <input type="text" id= nama value=" {{ $nama }}" readonly>
            </div>
            <div class="box">
                <input type="text" id= kelas value=" {{ $kelas }}" readonly>
            </div>
            <div class="box">
                <input type="text" id= npm value=" {{ $npm }}" readonly>
            </div>
        </div>
    </div>
</body>

</html>