
@extends('layout/user-managemant/index')

@section('konten-tambah-data-user')

@include('flash-message')
<form action="{{route('simpan-users')}}" method="post">
<h6  class="text-center title-add-user">TAMBAH DATA USER BARU</h6>
    @csrf
  <div class="mb-3">
    <label for="for_nama" class="form-label">Nama User</label>
    <input type="text" class="form-control" id="for_nama" name="for_nama" placeholder="Input nama user" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="for_email" placeholder="input email login user" aria-describedby="emailHelp">
  </div>
  <label for="for_level_login">Level Login</label>
  <select class="form-select mb-2" name="for_level_login" id="for_level_login" aria-label="Default select example">
  <option selected>Choose ..</option>
  <option value="1">Karyawan</option>
  <option value="2">Admin</option>
  <option value="3">Owner</option>
</select>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="for_password" placeholder="input password login user">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection


