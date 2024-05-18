
                <div class="content-wrapper">
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
                <span class="info-box-text">Absen day</span>
                <span class="info-box-number">#</span>
                </div>

                </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-user-xmark"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Karyawan belum absen</span>
                <span class="info-box-number">#</span>
                </div>

                </div>

                </div>


                </div>

                </div>


                </div>
                <div class="row" style="margin-top: 5vw;">
                <div class="col detail-dashboard">

                    <div class="detail-dashboard-title">
                        <h1>Dashboard <span> {{Auth::user()->level}}</span></h1>
                    </div>
                </div>


                <div class="col img-dashboard">
                    <img src="{{asset('img/dashboard.jpeg')}}" alt="">
                </div>
                </div>
                    </div><!-- /.container-fluid -->
    </div>
</div>
  


  