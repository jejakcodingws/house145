
@extends('layout/user-managemant/index')

@section('konten-tambah-data-user')
<form style="padding: 25px;" action="{{route('simpan-users')}}" method="post">
<h6  class="text-center title-add-user">TAMBAH DATA USER BARU</h6>
    @csrf
<div class="row">
  <div class="col">
    <div class="mb-3">
      <label for="for_nama" class="form-label">Nama User</label>
      <input type="text" class="form-control" id="for_nama" name="for_nama" placeholder="Input nama user" aria-describedby="emailHelp">
    </div>
    <label for="for_hari" class="form-label">email</label>
        <div class="input-group mb-3">
            <select class="form-select" name="for_email_karyawan" id="inputGroupSelect01">
                <option selected>Choose...</option>
                @foreach ($datakaryawan as $d)
                <option value="{{ $d -> email}}"></span>{{$d -> email}}</option>
                @endforeach
            </select>
            @if ($errors->has('for_email_karyawan'))
            <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_email_karyawan')}}</div>
            @endif
        </div>
  </div>
  <div class="col">
      <label for="for_level_login">Level Login</label>
      <select class="form-select mb-2" name="for_level_login" id="for_level_login">
      <option selected>Choose ..</option>
      <option value="karyawan">karyawan</option>
      <option value="admin">admin</option>
      <option value="owner">owner</option>
    </select>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="for_password" placeholder="input password login user">
      </div>
  </div>
</div>
 
  
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection


