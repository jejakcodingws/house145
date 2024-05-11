@extends('layout/site-karyawan/index')

@section ('konten-site-karyawan-blade')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
                                <a href="{{route('site-karyawan')}}" >
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
                                    <div class="inner">
                                    <h3>#</h3>
                                    <p>Laporan Pendapatan</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">cek data <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    </div>

                                    <div class="col-lg-3 col-6">

                                    <div class="small-box bg-success">
                                    <div class="inner">
                                    <h3>#</h3>
                                    <p>Laporan Pembelian Barang</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">cek data <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    </div>

                                    <div class="col-lg-3 col-6">

                                    <div class="small-box bg-warning">
                                    <div class="inner">
                                    <h3>#</h3>
                                    <p>laporan Kehadiran</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">cek data <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    </div>

                                    <div class="col-lg-3 col-6">

                                    <div class="small-box bg-danger">
                                    <div class="inner">
                                    <h3>#</h3>
                                    <p>Laporan Persediaan Barang</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">cek data<i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    </div>
                                    </div>
                                    
                                                                    </div>
                                                                </div>
                                        
                                                                
                                    </div>


                                    
  





                                    @endsection