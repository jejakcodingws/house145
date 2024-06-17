@extends('layout/site-karyawan/data-karyawan')

@section('konten-update-data-karyawan')
<form action="{{route('simpan-update-data-karyawan',  ['id' => $datakaryawan[0]->id] )}}" method="post" class="form-tambah-data-karyawan">
    @csrf
<div class="row">
    <div class="col">
        <div class="mb-3">
        <label for="for_nik_karyawan" class="form-label">NIK</label>
        <input type="text" class="form-control" id="for_nik_karyawan" value="{{old('for_nik_karyawan',$datakaryawan[0]->nik_karyawan)}}" name="for_nik_karyawan" placeholder="nomor induk karyawan">
        @if ($errors->has('for_nik_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nik_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_nama_karyawan" class="form-label">Nama</label>
        <input type="text" class="form-control" id="for_nama_karyawan" value="{{old('for_nama_karyawan',$datakaryawan[0]->nama)}}" name="for_nama_karyawan" placeholder="Input nama lengkap karyawan">
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
        <div class="mb-3">
        <label for="for_no_telepon" class="form-label">No Hp Karyawan</label>
        <input type="text" class="form-control" id="for_no_telepon" name="for_no_telepon" placeholder="+628xx xxxx xxxx">
        @if ($errors->has('for_no_telepon'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_no_telepon')}}</div>
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