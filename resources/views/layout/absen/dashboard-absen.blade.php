@extends('layout.site-karyawan.index')

@section('konten-dashboard-absen')
<div class="content-wrapper">
                    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
                <div class="row">
                    @include('flash-message')
                <!-- Earnings (Monthly) Card Example -->
                </div>
                    
                <h5 class="text-center">ABSEN KARYAWAN</h5>
<form action="{{route('simpan-data-karyawan')}}" method="post" class="form-tambah-data-karyawan">
    @csrf
<div class="row">
    <div class="col">
        <div class="mb-3">
        <label for="for_nik_karyawan" class="form-label">NIK</label>
        <input type="text" class="form-control" id="for_nik_karyawan" name="for_nik_karyawan" placeholder="Input Nik Karyawan">
        @if ($errors->has('for_nik_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nik_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_nama_karyawan" class="form-label">Nama</label>
        <input type="text" class="form-control" id="for_nama_karyawan" name="for_nama_karyawan" placeholder="Nama lengkap karyawan">
        @if ($errors->has('for_nama_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nama_karyawan')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_jam_masuk" class="form-label">Jam Masuk</label>
        <input type="text" class="form-control" id="for_jam_masuk" name="for_jam_masuk" placeholder="Absen masuk">
        @if ($errors->has('for_jam_masuk'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_jam_masuk')}}</div>
        @endif
        </div>
        <div class="mb-3">
        <label for="for_jam_keluar" class="form-label">Jam Keluar</label>
        <input type="text" class="form-control" id="for_jam_keluar" name="for_jam_keluar" placeholder="Absen keluar">
        @if ($errors->has('for_jam_keluar'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_jam_keluar')}}</div>
        @endif
        </div>
    </div>
    
    <div class="col">
        <h6>Data Berhasil Absen</h6>
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">JAM MASUK</th>
                            <th scope="col">JAM KELUAR</th>
                            <th scope="col">KETERANGAN</th>
                        </tr>
                    </thead>
                <tbody>
                
            <tr>
            <th scope="row">#</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        
             </tbody>
            </table>
    </div>
</div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

        </div>


    </div>
                    </div><!-- /.container-fluid -->
    </div>
</div>
  


  
@endsection