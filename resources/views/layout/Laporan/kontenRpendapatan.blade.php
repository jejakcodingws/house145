@extends('layout/laporan/konten-index')
@section('kontenRpendapatan')
<div class="filter">
                                                                @include('layout/laporan/form-filter')
                                                                </div>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Hari</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Pendapatan Harian</th>
    </tr>
  </thead>
  <tbody>
    @php
      $totalPemasukan = 0;
    @endphp
 @foreach ($dataLaporan as $dL)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{$dL -> hari}}</td>
      <td>{{$dL -> tanggal}}</td>  
      <td>{{ 'Rp ' . number_format($dL->pemasukan, 0, ',', '.') }}</td> 
    </tr>
    @php
        $totalPemasukan += $dL->pemasukan;
    @endphp
 @endforeach
    <tr>
      <th colspan="3" style="background-color:aqua; font-size:16px;">Total</th>
      <td class="bg-primary fw-bolder">{{'Rp' . number_format ($totalPemasukan, 0, ',', '.')}}</td>
    </tr>
   
  </tbody>
  
</table>
@endsection