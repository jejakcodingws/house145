<div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <div class="content-header">
          
            <div class="card shadow p-2 text-center">
                <h4>Master Data Input</h4>         
            </div>
@include('flash-message')

            <div class="row">
            <div class="col-lg-3 col-6" data-bs-target="#modalDataBaru" data-bs-toggle="modal">
                <div class="small-box bg-success">
                <div class="inner">
                <h3><i class="fa-solid fa-file-circle-plus"></i></h3>
                <p>Tambah Barang Baru</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer nav-link {{(Request::segment(1) == 'tambah-data-baru') ? 'active' : '' }}"> Tambah Data <i class="fa-solid fa-circle-plus"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modalinputdata">
                <div class="small-box bg-info">
                <div class="inner">
                <h3><i class="fa-regular fa-hand-point-right"></i></h3>
                <p>Barang Masuk</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer"> Update Data Masuk </a>
                </div>
            </div>

          <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modaldatakeluar">
            <div class="small-box bg-danger">
            <div class="inner">
            <h3><i class="fa-regular fa-hand-point-left"></i></h3>
            <p>Barang Keluar</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Update Data Keluar </a>
            </div>
            </div>

            <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modalpendapatanharian">
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>Rp</h3>
            <p>Pendapatan Hari ini</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Input Nominal Pendapatan</a>
            </div>
            </div>

            </div>



            <div class="card-footer">
            <div class="row">
            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <h5 class="description-header">
            Rp {{ $formatIncome }}
            </h5>
            <span class="description-text text-xs">Pendapatan Bulanan</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <h5 class="description-header">
            Rp {{ $formatIncomeTahun }}
            </h5>
            <span class="description-text text-xs">Pendapatan Tahunan</span>
            </div>
            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            @foreach ($datapenghasilan as $d)
            <h5 class="description-header">Rp {{ number_format($d->pemasukan, 0, ',', '.') }}</h5>
            @endforeach
         
            <span class="description-text text-xs">pendapatan hari ini</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block">
            @foreach ($targetPenghasilan as $d)
              <h5 class="description-header">Rp {{ number_format($d->nominal_target, 0, ',', '.') }}</h5>
            @endforeach
            <span class="description-text text-xs">Target sales</span>
            </div>

            </div>

           
            </div>

            </div>

            @yield('konten-update-data-barang')
            
            <div class="card-footer">
              
            <div class="row">
            
            <table class="table table-hover" 
            style="width: 100%; height:0;
            font-size:10px;">
          
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Kode Barang</th>
                  <th scope="col">Kategory</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Stok Minimal</th>
                  <th scope="col">Stok Masuk</th>
                  <th scope="col">Stok Keluar</th>
                  <th scope="col">Sisa Barang</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Date Update</th>
                </tr>
              </thead>
              <tbody>
              @php
                $i = ($dataTable->currentPage() - 1) * $dataTable->perPage() + 1;
              @endphp
                @foreach($dataTable as $d)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$d -> kd_barang }}</td>
                  <td>{{$d -> Kategory }}</td>
                  <td>{{$d -> nama_barang }}</td>
                  <td>{{$d -> stok_minimal_barang }}</td>
                  <td>{{$d -> stok_masuk }}</td>
                  <td>{{$d -> stok_keluar }}</td>
                  <td>{{$d -> stok_sisa }}</td>
                  <td>{{$d -> satuan }}</td>
                  <td>{{$d -> tanggal_dibuat }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            {{ $dataTable->links()}}
            </div>
                </div>       
            </div>



<!-- modal  start-->
<!-- modal menu side 2 -->


<!-- update target jual -->

<!-- Modal tambah data barang baru  -->

<div class="modal fade" id="modalDataBaru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h6 class="text-center">Tambah Barang Baru</h6>
<form id="form-tambah-data" class="tambah-data" action="{{route('simpan-data-baru')}}" method="post">
        @csrf
            <div class="mb-3" >
                <label for="jenis-pamakaian">Kategory barang</label>
                <div class="message-error-kategory-barang">
                    @if ($errors->has('for_kategory_barang'))
                      <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_kategory_barang')}}</div>
                    @endif
                   </div>
                    <div class="radio-btn-jns-pemakaian" id="jenis-pemakaian"
                    style="display: flex; gap:10px; margin-bottom: 15px; margin-top:5px;"
                    >
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="for_kategory_barang" value="Bar">Bar
                    <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="for_kategory_barang" value="Server">Server
                    <label class="form-check-label" for="radio2"></label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio3" name="for_kategory_barang" value="Kitchen">Kitchen
                    <label class="form-check-label" for="radio3"></label>
                    </div>
                 
                   
                </div>
              
            </div>
            <div class="mb-3">
                <label for="for_kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" name="for_kode_barang" id="for_kode_barang" value="{{old('for_kode_barang')}}" placeholder="exam : br-001">
                @if ($errors->has('for_kode_barang'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_kode_barang')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="for_nama_barang" class="form-label">Nama barang</label>
                <input type="text" class="form-control" name="for_nama_barang" id="for_nama_barang" value="{{old('for_nama_barang')}}" placeholder="Input Nama Barang">
                @if ($errors->has('for_nama_barang'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nama_barang')}}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="for_stok_minimal" class="form-label">Stok Minimal</label>
                <input type="text" class="form-control" name="for_stok_minimal" id="for_stok_minimal" value="{{old('for_stok_minimal')}}" placeholder="Input Stok Minimal Barang">
                @if ($errors->has('for_stok_minimal'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_stok_minimal')}}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="for_satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" name="for_satuan" id="for_satuan" value="{{old('for_satuan')}}" placeholder="exam : lembar/ikat, dll">
                @if ($errors->has('for_satuan'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_satuan')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</div>

</ta-bs-keyboard=>

<!-- Modal tambah qty data-->
<div class="modal fade" id="modalinputdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="tambah-data" action="{{route('simpan-data-masuk')}}" method="post">
        @csrf
          <div class="mb-3">
              <label for="jenis-pemakaian">Kategory barang</label>
              <select class="form-select" name="for_kategory_barang">
                  <option selected>Pilih barang</option>
                  @foreach ($barang->unique('kd_barang') as $b)
                      <option value="{{ $b->kd_barang }}">{{ $b->kd_barang }} | {{ $b->Kategory }} | {{ $b->nama_barang }}</option>
                  @endforeach
              </select>
          </div>
            <div class="mb-3">
                <label for="for_input_jumlah_barang" class="form-label">Qty</label>
                <input type="text" class="form-control" name="for_input_jumlah_barang" value="{{old('for_input_jumlah_barang')}}" id="for_input_jumlah_barang" placeholder="input dengan angka">
                @if ($errors->has('for_input_jumlah_barang'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_input_jumlah_barang')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal tambah data -->

<!-- Modal keluar data-->
<div class="modal fade" id="modaldatakeluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Barang Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class=""action="{{route('simpan-barang-keluar')}}" method="post">
        @csrf
      <div class="row">
          <div class="col-lg-6">
              <h6>Kategory</h6>
              <select class="form-select" name="form_kategory_barang">
                  <option selected>Pilih Kategory</option>
                  @foreach ($barang->unique('kd_barang') as $b)
                      <option value="{{ $b->kd_barang }}">{{ $b->kd_barang }} | {{ $b->Kategory }} | {{ $b->nama_barang }}</option>
                  @endforeach
              </select>
          </div>
        </div>
            <div class="mb-3">
                <label for="for_jumlah_keluar_barang" class="form-label">Qty</label>
                <input type="text" class="form-control" name="for_jumlah_keluar_barang" id="for_jumlah_keluar_barang" placeholder="input dengan angka">
                @if ($errors->has('for_jumlah_keluar_barang'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_jumlah_keluar_barang')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal keluar data -->

<!-- Modal pendapatan harian-->
<div class="modal fade" id="modalpendapatanharian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pendapatan Harian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('simpan-pendapatan')}}" method="post">
        @csrf
            <div class="mb-3">
                <label for="for_hari" class="form-label">Hari</label>
                <input type="text" class="form-control" name="for_hari" id="for_hari" placeholder="exam: senen">
            </div>
            <div class="mb-3">
                <label for="for_date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="for_date" id="for_date" placeholder="input dengan angka">
            </div>
            <div class="mb-3">
                <label id="pemasukan" for="for_pemasukan_hari_ini" class="form-label">Pemasukan hari ini</label>
                <input type="text" class="form-control" name="for_pemasukan_hari_ini" id="for_pemasukan_hari_ini" placeholder="Input Rupiah / Total duit masuk">
                <input type="hidden" id="pemasukan_hari_ini" name="pemasukan_hari_ini">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- verifikasi jika -->
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('modalDataBaru'), {
            keyboard: false
        });
        myModal.show();
    });
</script>
@endif

<!-- Tambahkan di resources/views/your_view.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var displayInput = document.getElementById('for_pemasukan_hari_ini');
        var hiddenInput = document.getElementById('pemasukan_hari_ini');
        
        displayInput.addEventListener('keyup', function (e) {
            var value = this.value.replace(/[^,\d]/g, '').toString();
            var originalValue = value.replace(/\./g, ''); // Nilai asli tanpa format

            // Update nilai asli di input tersembunyi
            hiddenInput.value = originalValue;

            var split = value.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            this.value = 'Rp ' + rupiah;
        });
    });
</>


<!-- end modal pendapatan keluar -->






  