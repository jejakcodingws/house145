@extends('layout/site-karyawan/index')
@section ('konten-site-karyawan')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
                                <a href="{{route('site-karyawan')}}" >
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                    <span><i class="fa-solid fa-circle-user"></i></span>    
                                    Site Karyawan</h6>
                                </div>
                                </a>

                                <div class="card-body">

                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <div class="container-fluid">
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{route('site-karyawan')}}"><span><i class="fa-solid fa-house"></i></span>Home</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link active {{ request()->is('site-karyawan-145/create') ? 'bg-success' : '' }} " aria-current="page" href="{{route('tambah-karyawan')}}"><span><i class="fa-solid fa-user-plus"></i></span>Data Karyawan</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#"><span><i class="fa-solid fa-calendar-days"></i></span>Input Absensi</a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                    </nav>
                                                                        
                                       
                                </div>
    </div>

    @yield('konten-tambah-data-karyawan')
    <table class="table table-hover">
    <thead>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">NIK</th>
      <th scope="col">NAMA</th>
      <th scope="col">EMAIL</th>
      <th scope="col">AKTIF KERJA</th>
      <th scope="col">STATUS KARYAWAN</th>
    </tr>
  </thead>
  <tbody>
  @foreach($datakaryawan as $d)
    <tr>
      <th scope="row">1</th>
      <td>{{$d -> nik_karyawan}}</td>
      <td>{{$d -> nama}}</td>
      <td>{{$d -> email}}</td>
      <td>{{$d -> aktif_kerja}}</td>
      <td>{{$d -> status_karyawan}}</td>
    </tr>
    @endforeach
  </tbody>
    </table>
                                </div>
                            </div>
     
                               
  </div>


  

@endsection
