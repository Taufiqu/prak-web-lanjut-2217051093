@extends('layouts.app')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('assets/css/list_user.css') }}">
@endpush

@section('content')

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>

@if ($users && count($users) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->nama_kelas }}</td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning mb-3">Detail</a>
                        |
                        <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        |
                        <form action="{{ route('user.destroy', $user['id'])}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </td>
                    <td><a href="{{ route('user.show', $user['id'])}}" class="btn btn-primary btn-sm">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada pengguna yang ditemukan.</p>
@endif

@endsection
