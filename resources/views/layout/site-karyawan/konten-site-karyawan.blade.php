@extends('layout/site-karyawan/index')
@section ('konten-site-karyawan')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
                                <a href="{{route('dashboard-karyawan')}}" >
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
                                            <a class="nav-link active {{ request()->is('site-karyawan-145') ? 'bg-success' : '' }}  " aria-current="page" href="{{route('dashboard-karyawan')}}"><span><i class="fa-solid fa-house"></i></span>Home</a>
                                            </li>
                                            @if(auth()->user()->level=="admin" || auth()->user()->level=="owner" )
                                            <li class="nav-item">
                                            <a class="nav-link active {{ request()->is('site-karyawan-145/create') ? 'bg-success' : '' }} " aria-current="page" href="{{route('tambah-karyawan')}}"><span><i class="fa-solid fa-user-plus"></i></span>Data Karyawan</a>
                                            </li>
                                            @endif
                                            @if(auth()->user()->level=="admin" || auth()->user()->level=="owner" )
                                            <li class="nav-item">
                                            <a class="nav-link active {{ request()->is('site-karyawan-145/data-karyawan') ? 'bg-success' : '' }} " aria-current="page" href="{{route('data-karyawan')}}"><span><i class="fa-solid fa-clipboard-user"></i></span>Lihat Data Karyawan</a>
                                            </li>
                                            @endif
                                            @if(auth()->user()->level=="admin" || auth()->user()->level=="owner" )
                                            <li class="nav-item">
                                            <a class="nav-link active  {{ request()->is('site-karyawan-145/create-absensi') ? 'bg-success' : '' }} " aria-current="page" href="{{route('tambah-data-absensi')}}"><span><i class="fa-solid fa-calendar-plus"></i></span>Input Absensi</a>
                                            </li>
                                            @endif
                                    
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Lihat Jadwal
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                        <li><a class="dropdown-item" href="{{route('jadwal-januari')}}">Januari</a></li>
                                                        <li><a class="dropdown-item" href="#">Februari</a></li>
                                                        <li><a class="dropdown-item" href="#">Maret</a></li>
                                                        <li><a class="dropdown-item" href="#">April</a></li>
                                                        <li><a class="dropdown-item" href="#">Mei</a></li>
                                                        <li><a class="dropdown-item" href="#">Juni</a></li>
                                                        <li><a class="dropdown-item" href="#">Juli</a></li>
                                                        <li><a class="dropdown-item" href="#">Agustus</a></li>
                                                        <li><a class="dropdown-item" href="#">September</a></li>
                                                        <li><a class="dropdown-item" href="#">Oktober</a></li>
                                                        <li><a class="dropdown-item" href="#">November</a></li>
                                                        <li><a class="dropdown-item" href="#">December</a></li>
                                                    </ul>
                                                </div>
                                           
                                        </ul>
                                        </div>
                                    </div>
                                    </nav>
                                                                        
                                       
                                </div>
    </div>
    @yield('konten-tambah-data-karyawan')
    @yield('konten-create-absensi-karyawan')
    <div class="konten-cek-jadwal">
    @yield('konten-jadwal-januari')
    </div>
    @yield('konten-data-karyawan')
    <div>
    @yield('konten-dashboard-site-karyawan')
    

    

  
                                </div>
                            </div>
     
                               
  </div>


  

@endsection
