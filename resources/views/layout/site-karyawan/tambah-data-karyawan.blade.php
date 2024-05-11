@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-tambah-data-karyawan')
<form action="{{route('simpan-data-karyawan')}}" method="post" class="form-tambah-data-karyawan">
    @csrf
<div class="row">
    <div class="col">
        <div class="mb-3">
        <label for="for_nik_karyawan" class="form-label">NIK</label>
        <input type="text" class="form-control" id="for_nik_karyawan" name="for_nik_karyawan" placeholder="nomor induk karyawan">
        @if ($errors->has('for_nik_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nik_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_nama_karyawan" class="form-label">Nama</label>
        <input type="text" class="form-control" id="for_nama_karyawan" name="for_nama_karyawan" placeholder="Input nama lengkap karyawan">
        @if ($errors->has('for_nama_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nama_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_alamat_karyawan" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="for_alamat_karyawan" name="for_alamat_karyawan" placeholder="input alamat karyawan">
        @if ($errors->has('for_alamat_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_alamat_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_departmant_karyawan" class="form-label">Departmant</label>
        <input type="text" class="form-control" id="for_departmant_karyawan" name="for_departmant_karyawan" placeholder="input bagian kerja">
        @if ($errors->has('for_departmant_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_departmant_karyawan')}}</div>
        @endif
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="for_email_karyawan" class="form-label">email</label>
            <input type="email" class="form-control" id="for_email_karyawan" name="for_email_karyawan" placeholder="input bagian kerja">
                @if ($errors->has('for_email_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_email_karyawan')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_tgl_mulai_kerja" class="form-label">Aktif Kerja</label>
            <input type="date" class="form-control" id="for_tgl_mulai_kerja" name="for_tgl_mulai_kerja" placeholder="input bagian kerja">
                @if ($errors->has('for_tgl_mulai_kerja'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_tgl_mulai_kerja')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_tgl_lahir_karyawan" class="form-label">Tempat, tanggal lahir</label>
            <input type="text" class="form-control" id="for_tgl_lahir_karyawan" name="for_tgl_lahir_karyawan" placeholder="Jakarta, 08-05-1999">
                @if ($errors->has('for_tgl_lahir_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_tgl_lahir_karyawan')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_status_karyawan" class="form-label">Status karyawan</label>
            <input type="text" class="form-control" id="for_status_karyawan" name="for_status_karyawan" placeholder="Pelajar/Nikah">
                @if ($errors->has('for_status_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_status_karyawan')}}</div>
                @endif
        </div>
    </div>
</div>
 
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection