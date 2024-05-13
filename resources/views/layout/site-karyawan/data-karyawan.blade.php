@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-data-karyawan')
<table class="table table-hover">
    <thead>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">NIK</th>
      <th scope="col">NAMA</th>
      <th scope="col">EMAIL</th>
      <th scope="col">AKTIF KERJA</th>
      <th scope="col">STATUS KARYAWAN</th>
    </tr>
  </thead>
  <tbody>
  @foreach($datakaryawan as $d)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{$d -> nik_karyawan}}</td>
      <td>{{$d -> nama}}</td>
      <td>{{$d -> email}}</td>
      <td>{{$d -> aktif_kerja}}</td>
      <td>{{$d -> status_karyawan}}</td>
    </tr>
    @endforeach
  </tbody>
    </table>
@endsection