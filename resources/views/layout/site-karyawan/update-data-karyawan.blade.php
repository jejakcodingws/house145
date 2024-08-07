@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-update-data-karyawan')
<form action="{{route('simpan-update-data-karyawan',  ['nik_karyawan' => $datakaryawan->nik_karyawan] )}}" method="post" class="form-tambah-data-karyawan">
    @csrf
<div class="row">
    <div class="col">
        <div class="mb-3">
        <label for="for_nik_karyawan" class="form-label">NIK</label>
        <input type="text" class="form-control" id="for_nik_karyawan" value="{{old('for_nik_karyawan',$datakaryawan->nik_karyawan)}}" name="for_nik_karyawan" placeholder="nomor induk karyawan">
        @if ($errors->has('for_nik_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nik_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_nama_karyawan" class="form-label">Nama</label>
        <input type="text" class="form-control" id="for_nama_karyawan" value="{{old('for_nama_karyawan',$datakaryawan->nama)}}" name="for_nama_karyawan" placeholder="Input nama lengkap karyawan">
        @if ($errors->has('for_nama_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nama_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_alamat_karyawan" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="for_alamat_karyawan" 
        value="{{old('for_alamat_karyawan',$datakaryawan->alamat_domisili)}}"
        name="for_alamat_karyawan" placeholder="input alamat karyawan">
        @if ($errors->has('for_alamat_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_alamat_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_departmant_karyawan" class="form-label">Departmant</label>
        <input type="text" class="form-control" id="for_departmant_karyawan" 
        value="{{old('for_departmant_karyawan',$datakaryawan->area_kerja)}}"
        name="for_departmant_karyawan" placeholder="input bagian kerja">
        @if ($errors->has('for_departmant_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_departmant_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_no_telepon" class="form-label">No Hp Karyawan</label>
        <input type="text" class="form-control" id="for_no_telepon" name="for_no_telepon" 
        value="{{old('for_no_telepon',$datakaryawan->no_telepon)}}"
        placeholder="+628xx xxxx xxxx">
        @if ($errors->has('for_no_telepon'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_no_telepon')}}</div>
        @endif
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="for_email_karyawan" class="form-label">email</label>
            <input type="email" class="form-control" id="for_email_karyawan" 
            value="{{old('for_email_karyawan',$datakaryawan->email)}}" name="for_email_karyawan" placeholder="input bagian kerja">
                @if ($errors->has('for_email_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_email_karyawan')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_tgl_mulai_kerja" class="form-label">Aktif Kerja</label>
            <input type="date" class="form-control" id="for_tgl_mulai_kerja" 
            value="{{old('for_tgl_mulai_kerja',$datakaryawan->aktif_kerja)}}"name="for_tgl_mulai_kerja" placeholder="input bagian kerja">
                @if ($errors->has('for_tgl_mulai_kerja'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_tgl_mulai_kerja')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_tgl_lahir_karyawan" class="form-label">Tempat, tanggal lahir</label>
            <input type="text" class="form-control" id="for_tgl_lahir_karyawan" 
            value="{{old('for_tgl_lahir_karyawan',$datakaryawan->tempat_tanggal_lahir)}}"
            name="for_tgl_lahir_karyawan" placeholder="Jakarta, 08-05-1999">
                @if ($errors->has('for_tgl_lahir_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_tgl_lahir_karyawan')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label for="for_status_karyawan" class="form-label">Status karyawan</label>
            <input type="text" class="form-control" id="for_status_karyawan"
            value="{{old('for_status_karyawan',$datakaryawan->status_karyawan)}}"
            name="for_status_karyawan" placeholder="Pelajar/Nikah">
                @if ($errors->has('for_status_karyawan'))
                    <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_status_karyawan')}}</div>
                @endif
        </div>
    </div>
</div>
 
  <button type="submit" 
  onclick="return confirm('Update nama : {{$datakaryawan -> nama}} ?')"
  class="btn btn-primary">Simpan</button>
</form>
@endsection