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
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->kelas->nama_kelas ?? 'Tidak ada' }}</td>
                    <td>
                        @if ($user->foto)
                        <img src="{{ asset($user->foto)}}" alt="User Photo" width="100" class="mt-2">
                        @endif
                    </td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada pengguna yang ditemukan.</p>
@endif

@endsection
