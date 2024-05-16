@extends('layout/site-karyawan/konten-site-karyawan')
@section ('konten-dashboard-site-karyawan')

    <!-- Content Header (Page header) -->
  
    <div class="row card-site-karyawan">
        <div class="col detail-site-karyawan"
        style="display: flex; flex-direction:column; justify-content:center;
        align-items:center; font-size: 22px; font-weight:bolder;">
        <span class=" " style="color: gold;">Disiplin</span> adalah jembatan antara tujuan dan pencapaian.
        </div>
        <div class="col img-site-karyawan">
            <img class="scale-75 translate-x-4 skew-y-3 md:transform-none" id="transition-img" src="{{asset('img/teamwork.jpg')}}" alt="">
        </div>
    </div>
   

@endsection
