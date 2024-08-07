<div >

    <div>
                <div class="content-wrapper  section-dashboard">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                    <div class="container-fluid">
                    <div class="row">
                    @include('flash-message')
                <!-- Earnings (Monthly) Card Example -->
                                </div>
                    
                                <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-clipboard-user"></i></span>
                <div class="info-box-content">
                <span class="info-box-text" style="font-size: 12px;">Total Berhasil Absen</span>
                <span class="info-box-number">{{($countAbsensi)}}</span>
                </div>

                </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-user-check"></i></span>
                <div class="info-box-content">
                <span class="info-box-text"style="font-size: 12px;" >Karyawan sudah absen</span>
                <span class="info-box-number">
                @foreach ($sudahAbsen as $in)
                    <li class="data-list-nama" >{{ $in->nama }}</li>
                @endforeach
                </span>
                </div>

                </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa-solid fa-user-xmark"></i></span>
                <div class="info-box-content">
                <span class="info-box-text"style="font-size: 12px;" >Karyawan belum absen</span>
                <span class="info-box-number">
                @foreach ($belumAbsen as $in)
                    <li class="data-list-nama" >{{ $in->nama }}</li>
                @endforeach
                </span>
                </div>

                </div>

                </div>


                </div>

                </div>


                </div>
                <div class="row">
                <div class="col detail-dashboard">

                    <div class="detail-dashboard-title">
                        <h1>Dashboard <span> {{Auth::user()->level}}</span></h1>
                    </div>
                </div>

                </div>
            </div><!-- /.container-fluid -->
    </div>
</div>
  


  