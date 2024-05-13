@extends('layout/site-karyawan/konten-site-karyawan')

@section('konten-create-absensi-karyawan')
<form action="{{route('simpan-data-absensi')}}" method="post" class="form-create-absensi-karyawan">
    @csrf
<div class="row">
    <div class="col">
    <label for="for_hari" class="form-label">NIK | NAMA KARYAWAN</label>
        <div class="input-group mb-3">
            
            <select class="form-select" name="for_nik_karyawan" id="inputGroupSelect01">
                <option selected>Choose...</option>
                @foreach ($datakaryawan as $d)
                <option value="{{ $d -> nik_karyawan}}">{{$d -> nik_karyawan}}<span> | </span>{{$d -> nama}}</option>
                @endforeach
            </select>
            @if ($errors->has('for_nik_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nik_karyawan')}}</div>
            @endif
        </div>
            <label for="for_hari" class="form-label">HARI</label>
            <div class="input-group mb-3">
            <select class="form-select" name="for_hari" id="for_hari">
                <option selected>Choose ...</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
            @if ($errors->has('for_hari'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_hari')}}</div>
            @endif
        </div>
      
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="for_tgl_bln_thn" class="form-label">Tanggal-bulan-tahun</label>
            <input type="date" class="form-control" id="for_tgl_bln_thn" name="for_tgl_bln_thn" placeholder="Input sesuai tgl masuk karyawan">
            @if ($errors->has('for_tgl_bln_thn'))
                <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_tgl_bln_thn')}}</div>
            @endif
            </div>
            <label for="for_shift" class="form-label">SHIFT</label>
            <div class="input-group mb-3">
            <select class="form-select" name="for_shift" id="for_shift">
                <option selected>Choose ...</option>
                <option value="M">M</option>
                <option value="E">E</option>
                <option value="MIDDLE">MIDDLE</option>
                <option value="E1">E1</option>
                <option value="M-E">M-E</option>
            </select>
            @if ($errors->has('for_shift'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_shift')}}</div>
            @endif
        </div>
    </div>
</div>
 
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection