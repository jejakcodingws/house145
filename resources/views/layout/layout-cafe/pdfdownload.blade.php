@extends('layout/layout-cafe/invoice')
@section('konten-pdf-download')
<style>
    .label-konten {
        display: flex;
        flex-direction: column;
    }
    .section-konten-center{
        text-align: center;
    }
    .card {
        width: 75%;
        margin: 0;
        /* align-items: center; */
    }
    .card-header {
        text-align: center;
    }
    .konten-utama-invoice {
        display: flex;
        flex-direction: column;
    }
    .konten-utama-kedua  {
        display: flex;
        flex-direction: row;
        text-align: center;
        margin: auto;
        padding: 10px;
        border: 1px;
        gap: 15px;
    }
    .status_pelunasan {
        font-weight: 500;
        color: green;
        font-size: 25px;
    }
</style>


<div class="card">
  <h5 class="card-header">Invoice</h5>
  <div class="card-body card-konten">
    <div>
        <h6>House of tebet 145</h6>
        <h6>Jl. Tebet Raya 145C, Jakarta selatan </h6>
        <h6>Telp 0858-8102-1152</h6>
    </div>

    <section class="section-konten-center">
    <h5>Reservasi A.N
                
                <span>{{ $data[0]->nama_reservasi }}</span>
                
    </h5>
    <div class="label-konten">
        <div class="konten-utama-invoice">
            </label>
            <label for="">Hp :
                
                <span>{{ $data[0]->no_hp }}</span>
               
            </label>
            <label for="">Alamat :
               
                <span>{{ $data[0]->alamat }}</span>
              
            </label>
        </div>
        <div class="konten-utama-kedua border border-black">
            <p>Reservasi = {{$data[0] -> jumlah_reservasi}}pax
            <p>Per customer = Rp.<span>{{$data[0] -> nominal_per_orang}}</span>
            <p>Total = Rp. {{ number_format($data[0]->nominal_per_orang * $data[0]->jumlah_reservasi, 3, ',', '.') }}</p>
        </div>
        <div>
            <p class="status_pelunasan">{{$data[0] -> status}}</p>
        </div>
    </div>
    </section>

                <div style="text-align: end;">
                    <h5>Hormat Kami</h5>
                    <h5>House of tebet 145</h5>
                </div>
    <br>
    <br>
    <a href="{{route('downloadpdf',['id' => $data[0] -> id])}}" target="_blank" class="btn btn-primary">Download</a>
  </div>
</div>
@endsection