<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile-pic">
            <!-- Tampilkan foto user atau gambar default jika foto tidak ada -->
            @if ($user->foto)
                <img src="{{ asset($user->foto) }}" alt="Foto Profil">
            @else
                <img src="{{ asset('/assets/img/PP.jpeg') }}" alt="Foto Default">
            @endif
        </div>
        <div class="info-box">
            <div class="box">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" value="{{ $user->nama }}" readonly>
            </div>
            <div class="box">
                <label for="kelas">Kelas:</label>
                <input type="text" id="kelas" value="{{ $user->kelas->nama_kelas ?? 'kelas tidak ditemukan' }}" readonly>
            </div>
            <div class="box">
                <label for="npm">NPM:</label>
                <input type="text" id="npm" value="{{ $user->npm }}" readonly>
            </div>
        </div>
    </div>
</body>
</html>
