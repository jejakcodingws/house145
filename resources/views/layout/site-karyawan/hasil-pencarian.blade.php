@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-hasil-pencarian')

<table class="table table-hover">
    <thead>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">NIK</th>
      <th scope="col">NAMA</th>
      <th scope="col">HARI</th>
      <th scope="col">SHIFT</th>
      <th scope="col">TANGGAL - BULAN - TAHUN</th>

    </tr>
  </thead>
  <tbody>
  @foreach($karyawan as $d)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{$d -> nik_karyawan}}</td>
      <td>{{$d -> nama}}</td>
      <td>{{$d -> hari}}</td>
      <td>{{$d -> shift}}</td>
      <td>{{$d -> tgl_bln_thn}}</td>

    </tr>
    @endforeach
  </tbody>
    </table>
@endsection