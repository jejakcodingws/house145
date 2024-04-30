@extends('layout/layout-cafe/index')

@section('konten-invoice')
<style>
  .div-konten-invoice {
    margin: auto;
    align-items: center;
  }
  .konten-pdf-download {
    padding: 1rem;
  }
</style>

<h5>Invoice</h5>
<div style="width: 50%;">
@include('layout/flash-message')
</div>
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
@php
  $i = 1
@endphp

@foreach ($data as $key => $a)
    <tr>
      <th scope="row">{{$data->firstItem()+$key }}</th>
      <td>{{$a -> nama_reservasi}}</td>
      <td>{{$a -> jumlah_reservasi}}</td>
      <td>{{$a -> status}}</td>
      <td style="display: flex; flex-direction:column">
        <a href="{{ route('simpanpdf', ['id' => $a->id] )}}"><i class="fas fa-save"></i></a>
      </td>
    </tr>
  @endforeach
  <div>
</div>
  </tbody>
</table>


{{ $data->links() }}
<div class="konten-pdf-download">
  @yield('konten-pdf-download')
</div>
<div class="">
        @yield('konten-form-invoice')
  </div>
@endsection
