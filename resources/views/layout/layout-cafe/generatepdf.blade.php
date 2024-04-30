<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    .label-konten {
        display: flex;
        flex-direction: column;
    }
    .section-konten-center{
        text-align: center;
    }
 
    /* .card-konten {
        padding: 3rem;
        gap: 5rem; */
    
    .card {
        width: 100%;
        margin: auto;
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
        text-align: center;
        border: 1px;
        
    }
    .status_pelunasan {
        font-weight: 500;
        color: green;
        font-size: 25px;
    }
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
  <h5 class="card-header">Invoice</h5>
  <div class="card-body card-konten">
    <div class="mb-5 mt-5">
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
            <label for="">Hp :
                <span>{{ $data[0]->no_hp }}</span>
            </label>
            <br>
            <label for="">Alamat :
                <span>{{ $data[0]->alamat }}</span>
            </label>
        </div>
        <div class="gap-5">
            Reservasi = {{$data[0] -> jumlah_reservasi}}pax, <hr> Per customer = Rp.{{$data[0] -> nominal_per_orang}}, Total = Rp. {{ number_format($data[0]->nominal_per_orang * $data[0]->jumlah_reservasi, 3, ',', '.') }}
        </div>
        <div class="mb-3 mt-5">
            <p class="status_pelunasan">{{$data[0] -> status}}</p>
        </div>
    </div>
    </section>

    <section class="text-end mr-5">
        <h5 class="mb-3">Hormat kami,</h5>
        <h5 class="">House of tebet 145</h5>
    </section>
    <br>
    <br>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

