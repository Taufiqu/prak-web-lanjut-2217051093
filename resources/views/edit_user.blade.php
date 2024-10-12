@extends('layouts.app')

@push('custom-css')
<link rel="stylesheet" href="{{asset('assets/css/create_user.css')}}">
@endpush

@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $user->nama)}}">
        @foreach ($errors->get('nama') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
        <br>
        <label for="id_kelas">Kelas</label><br>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasitem)
            <option value="{{$kelasitem->id}}"
                {{ $kelasitem->id == $user->kelas_id ? 'selected' : ' ' }}>
                {{$kelasitem->nama_kelas}}
            </option>
            @endforeach
        </select>
        <br>
        <label>NPM</label>
        <input type="text" name="npm" value="{{ old('npm', $user->npm)}}">
        @foreach ($errors->get('npm') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
        <br>
        <input type="file" id="foto" name="foto"><br><br>
        <label for="foto">foto:</label><br>
        @if ($user->foto)
        <img src="{{ asset($user->foto)}}" alt="User Photo" width="100" class="mt-2">
        @endif
        <input type="submit" name="submit" value="Submit">
    </form>
@endsection
    