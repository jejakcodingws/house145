<div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <div class="content-header">
          
            <div class="card shadow p-2 text-center">
                <h4>Master Data</h4>         
            </div>
@include('flash-message')
            <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                <h3><i class="fa-solid fa-file-circle-plus"></i></h3>
                <p>Tambah Barang Baru</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('tambah-data-baru')}}" class="small-box-footer nav-link {{(Request::segment(1) == 'tambah-data-baru') ? 'active' : '' }}"> Tambah Data <i class="fa-solid fa-circle-plus"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modalinputdata">
                <div class="small-box bg-info">
                <div class="inner">
                <h3>%</h3>
                <p>Barang Masuk</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer"> Update Data Masuk <i class="fa-solid fa-circle-plus"></i></a>
                </div>
            </div>

          <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modaldatakeluar">
            <div class="small-box bg-danger">
            <div class="inner">
            <h3>%</h3>
            <p>Barang Keluar</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Update Data Keluar <i class="fa-solid fa-circle-minus"></i></a>
            </div>
            </div>

            <div class="col-lg-3 col-6" data-bs-toggle="modal" data-bs-target="#modalpendapatanharian">
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>%</h3>
            <p>Pendapatan Harian</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Input Nilai <i class="fa-solid fa-percent"></i></a>
            </div>
            </div>

            </div>



            <div class="card-footer">
            <div class="row">
            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <h5 class="description-header">
                {{$dataToday}}
            </h5>
            <span class="description-text text-xs">Total input data today</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <h5 class="description-header">$10,390.90</h5>
            <span class="description-text text-xs">Pendapatan kemarin</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            @foreach ($datapenghasilan as $d)
            <h5 class="description-header">{{$d -> pemasukan}}</h5>
            @endforeach
         
            <span class="description-text text-xs">pendapatan hari ini</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block">
            <h5 class="description-header">$24,813.53</h5>
            <span class="description-text text-xs">Target Jual</span>
            </div>

            </div>
            </div>

            </div>
            <div class="card-footer">
            <div class="row">
            <div 
               style="padding: 15px;
               width:40vh;
               font-size:12px;
               margin-top:10px;">
               @yield('konten-tambah-data-baru')
            </div>

            <table class="table table-hover" 
            style="width: 70%; height:0; position:static;  
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

<!-- Modal tambah data-->
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
                <label for="for_pemasukan_hari_ini" class="form-label">Pemasukan hari ini</label>
                <input type="text" class="form-control" name="for_pemasukan_hari_ini" id="for_pemasukan_hari_ini" placeholder="Input Rupiah / Total duit masuk">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal pendapatan keluar -->






  