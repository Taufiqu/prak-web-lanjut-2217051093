@extends('layouts.app')

@push('custom-css')
<link rel="stylesheet" href="{{asset('assets/css/create_user.css')}}">
@endpush

@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label>Nama</label>
        <input type="text" name="nama" value="">
        @foreach ($errors->get('nama') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
        <br>
        <label for="id_kelas">Kelas</label><br>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasitem)
            <option value="{{$kelasitem->id}}">{{$kelasitem->nama_kelas}}</option>
            @endforeach
        </select>
        <br>
        <label>NPM</label>
        <input type="text" name="npm" value="">
        @foreach ($errors->get('npm') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
@endsection
    