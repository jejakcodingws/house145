@extends('layout/laporan/konten-index')
@section('kontenRabsensi')

<!-- Form Filter Bulan -->
<form method="GET" action="{{ route('Rabsensi') }}" class="mb-3">
    <label for="bulan">Pilih Bulan:</label>
    <select name="bulan" id="bulan" class="form-control w-auto d-inline-block">
        <option value="">Semua Bulan</option>
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
            </option>
        @endfor
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- Tabel Data Absensi -->
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Shift</th>
      <th scope="col">Hari</th>
      <th scope="col">Tgl Masuk</th>
      <th scope="col">Jam Masuk</th>
      <th scope="col">Jam Keluar</th>
      <th scope="col">Status Absen</th>
    </tr>
  </thead>
  <tbody>
@foreach ($dataAbsensi as $dA)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$dA->nik_karyawan}}</td>
        <td>{{$dA->nama}}</td>
        <td>{{$dA->shift}}</td>
        <td>{{$dA->hari}}</td>
        <td>{{$dA->tgl_bln_thn}}</td>
        <td>{{$dA->jam_masuk}}</td>
        <td>{{$dA->jam_keluar}}</td>
        <td>
            @if(is_null($dA->jam_masuk) && is_null($dA->jam_keluar))
                karyawan alpha
            @elseif(is_null($dA->jam_masuk) || is_null($dA->jam_keluar))
                <span class="bg-danger p-1 rounded">Absen Keluar</span>
            @else
                <span class="rounded bg-success p-1">{{ $dA->keterangan_absen }}</span>
            @endif
        </td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection
