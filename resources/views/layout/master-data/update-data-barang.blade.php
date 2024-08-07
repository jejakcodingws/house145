@extends('layout/master-data/index')

@section('konten-update-data-barang')
<h6 class="text-center">Update Barang Baru</h6>
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
@endsection