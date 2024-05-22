
<style>
    .form-invoice {
        padding: 15px;
    }
    .form-invoice-input h3 {
      text-align: center;
    }
</style>


<form class="form-invoice form-invoice-input" action="{{route('simpan-invoice')}}" method="post">
@csrf
<h3>Form Invoice</h3>
    <div class="row">
        <div class="col">
          <div class="mb-3">
              <label for="for_nama" class="form-label">Nama Reservasi</label>
              <input type="text" class="form-control" id="for_nama" name="for_nama" autofocus placeholder="Input nama Perusahaan atau PT">
              @if ($errors->has('for_nama'))
                  <div class="badge text-bg-danger" style="color:red;">{{$errors->first('for_nama')}} <i class="fa-solid fa-triangle-exclamation"></i> </div>
              @endif
            </div>
           
            <div class="mb-3">
              <label for="for_hp" class="form-label">No Hp</label>
              <input type="text" class="form-control" name="for_hp" id="for_hp" placeholder="Input dengan nomer HP Customer">
              @if ($errors->has('for_hp'))
                  <div class="badge text-bg-danger">{{$errors->first('for_hp')}}</div>
              @endif
            </div>
           

            <div class="mb-3">
              <label for="for_alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="for_alamat" id="for_alamat" placeholder="Input alamat PT atau Perusahaan">
              @if ($errors->has('for_alamat'))
                  <div class="badge text-bg-danger">{{$errors->first('for_alamat')}}</div>
              @endif
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
              <label for="for_nominal" class="form-label">Nominal</label>
              <input type="text" class="form-control" name="for_nominal" id="for_nominal" placeholder="input nominal per orang">
            </div>
            @if ($errors->has('for_nominal'))
                  <div class="badge text-bg-danger">{{$errors->first('for_nominal')}}</div>
            @endif

            <div class="mb-3">
              <label for="for_jumlah" class="form-label">Jumlah</label>
              <input type="text" class="form-control" id="for_jumlah" name="for_jumlah" placeholder="Input jumlah customer">
            </div>
            @if ($errors->has('for_jumlah'))
                  <div class="badge text-bg-danger">{{$errors->first('for_jumlah')}}</div>
            @endif

            <div class="mb-3">
              <label for="for_status" class="form-label">Status</label>
              <input type="text" class="form-control" id="for_status" name="for_status" placeholder="input status bayar update">
            </div>
            @if ($errors->has('for_status'))
                  <div class="badge text-bg-danger">{{$errors->first('for_status')}}</div>
            @endif
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>