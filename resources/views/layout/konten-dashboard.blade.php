

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
      @include('flash-message')
<!-- Earnings (Monthly) Card Example -->
                </div>
                <marquee style="background-color:blue; color:white; font-size:20px; align-items:center; text-align:center; font-family:'Times New Roman', Times, serif; border-radius:12px;" behavior="up" scrolldelay="300" direction="up">Papan Informasi House of Tebet 145</marquee>
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
  


  