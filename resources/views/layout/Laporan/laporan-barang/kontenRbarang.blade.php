@extends('layout/laporan/konten-index')
@section('kontenRbarang')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Hari</th>
      <th scope="col">Nama barang</th>
      <th scope="col">Stok Minimal</th>
      <th scope="col">Satuan</th>
      <th scope="col">Stok Sisa</th>
    </tr>
  </thead>
  <tbody>
@foreach ($dataBarang as $dB)
    <tr>
     <td>{{$loop -> iteration}}</td>
     <td>{{$dB -> kd_barang}}</td>
     <td>{{$dB -> nama_barang}}</td>
     <td>{{$dB -> stok_minimal_barang}}</td>
     <td>{{$dB -> satuan}}</td>
     <td>{{$dB -> stok_sisa}}</td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection