

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
      @include('flash-message')
<!-- Earnings (Monthly) Card Example -->
                </div>
                <div class="row">
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
  


  