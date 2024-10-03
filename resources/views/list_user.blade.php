@extends('layouts.app')

@push('custom-css')
<link rel="stylesheet" href="{{asset('assets/css/list_user.css')}}">
@endpush

@section('content')
<table>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nama</th>
 <th>NPM</th>
 <th>Kelas</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 <?php
 foreach ($users as $user) {
 ?>
 <tr>
 <td><?= $user['id'] ?></td>
 <td><?= $user['nama'] ?></td>
 <td><?= $user['npm'] ?></td>
 <td><?= $user['nama_kelas'] ?></td>
 <td></td>
 </tr>
 <?php
 }
 ?>
 </tbody>
</table>
@endsection