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
      <th scope="col">STATUS NIKAH</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
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
      
      <td>
      <a href="{{route('update-data-karyawan', ['nik_karyawan' => $d->nik_karyawan]) }}" >
        <i class="fa-solid fa-gears" style="color: #0f89e6;"></i></td>
      </a>
      
      <td>
        <a href="{{route('hapus-data-karyawan', ['id' => $d->id])}}">
        <i class="fa-regular fa-trash-can" style="color: #ba2626;"></i>
        </a>
      
      </td>
    </tr>
    @endforeach
   
  </tbody>
    </table>
@endsection