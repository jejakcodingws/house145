@extends('layout/site-karyawan/index')

@section ('konten-site-karyawan-blade')
<div 
style="background-color:azure" class="content-wrapper section-laporan">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
        
                                <a href="#" >
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                    <span><i class="fa-solid fa-book-bookmark fa-bounce"></i></span>    
                                    Laporan</h6>
                                </div>
                                </a>

                                <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div class="icon">
                                    <i class="ion ion-bag"></i>
                                    </div>
                                    
                                    <a href="{{route('Rpendapatan')}}" class="small-box-footer nav-link  {{ request()->is('laporan/laporan-pendapatan') ? 'bg-white' : '' }} ">
                                    <div class="inner">
                                    <h3><i class="fa-solid fa-hand-holding-dollar"></i></h3>
                                    <p>Laporan Pendapatan</p>
                                    </div></a>
                                    
                                    </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div class="icon">
                                    <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{route('Rbarang')}}" class="small-box-footer {{ request()->is('laporan/laporan-barang') ? 'bg-white' : '' }}  ">
                                    <div class="inner">
                                    <h3><i class="fa-solid fa-cubes"></i></h3>
                                    <p>Laporan Barang</p>
                                    </div></a>
                                    </div>
                                    </div>
<!-- 
                                    <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div class="icon">
                                    <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{route('Rabsensi')}}" class="small-box-footer {{ request()->is('laporan/laporan-absensi') ? 'bg-white' : '' }}">
                                    <div class="inner">
                                    <h3><i class="fa-solid fa-fingerprint"></i></h3>
                                    <p>Laporan Absensi</p>
                                    </div></a>
                                    </div>
                                    </div> -->

                                    <!-- <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div class="icon">
                                    <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                    <div class="inner">
                                    <h3><i class="fa-solid fa-money-bill-trend-up"></i></h3>
                                    <p>Pemasukan Bulanan</p>
                                    </div></a>
                                    </div>
                                    </div> -->

                                    </div>
                                    
                                                                    </div>
                                                                </div>

                                                         
                                        
                                                                
                                    </div>


                                    

                                    <div class="section-konten p-2 text-center">
                                            @yield('kontenRpendapatan')
                                            @yield('kontenGenerateLaporanPDF')
                                            @yield('kontenRbarang')
                                            @yield('kontenRabsensi')
                                    </div>
                                    
                                    @endsection