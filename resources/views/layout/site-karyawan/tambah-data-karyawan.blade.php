@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-tambah-data-karyawan')

<h6>Tambah Data</h6>
<form>
<div class="row">
    <div class="col">
        <div class="mb-3">
        <label for="for_nik_karyawan" class="form-label">NIK</label>
        <input type="email" class="form-control" id="for_nik_karyawan" name="for_nik_karyawan" placeholder="nomor induk karyawan">
        @if ($errors->has('for_jumlah_keluar_barang'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_jumlah_keluar_barang')}}</div>
        @endif
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </div>
</div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection