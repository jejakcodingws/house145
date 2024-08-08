
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow">
        @include('layout/flash-message')
                                <a href="{{route('user-manage')}}" >
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                    <span><i class="fa-solid fa-gears"></i></span>    
                                    Master Data User</h6>
                                </div>
                                </a>
                                <div class="card-body">
                                <nav class="navbar navbar-expand-lg  ">
                                    <div class="container-fluid">
                                        <div class="navbar-menu navbar-collapse" id="navbarSupportedContent">
                                        <ul style="gap: 5px;" class="navbar-nav me-auto mb-2  navbar-list">
                                        <li class="nav-item">
                                        <a href="{{ route('add-users') }}" class=" fw-bold nav-link {{ request()->is('User-managemant/add-users') ? 'bg-success' : '' }}">
                                            <span><i class="fa-solid fa-user-plus"></i></span>    
                                            Add user login
                                        </a>
                                        </li>
          
                                            <li style="cursor:pointer;" class="nav-item"   data-bs-toggle="modal" data-bs-target="#modalinputtarget" >
                                            <a class="nav-link fw-bold">
                                            <span><i class="fa-solid fa-money-bill-trend-up"></i></span>    
                                            Input Target</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link fw-bold {{ request()->is('User-managemant/Data-target') ? 'bg-success' : '' }} " href="{{route('data-target')}}">
                                            <span><i class="fa-solid fa-arrows-to-eye"></i></span>    
                                            Data Target</a>
                                            </li>
                                    
                                        </ul>
                                       
                                       
                                        </div>
                                      
                            
                             
                                    </div>
                                    
                                    </nav>
                                   <!-- konten table data user -->
                                   @yield('konten-data-user')
                                   @yield('konten-tambah-data-user')
                                   @yield('konten-data-target') 
                                   @yield('konten-update-password') 
                              
                                
                                </div>
                                
                               
                            </div>
                            
                        </div>
                        
  </div>


  <!-- input target jual -->
<div class="modal fade" id="modalinputtarget" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Input Target Office</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="tambah-data" action="{{route('simpan-target')}}" method="post">
        @csrf
            <div class="mb-3">
                <label for="target_name" class="form-label">Kode Target</label>
                <input type="text" class="form-control" name="target_name" value="{{old('target_name')}}" id="target_name" placeholder="cth: tg-mei">
                @if ($errors->has('target_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('target_name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="bulan_name" class="form-label">Bulan</label>
                <input type="date" class="form-control" name="bulan_name" value="{{old('bulan_name')}}" id="bulan_name" placeholder="input bulan saja">
                @if ($errors->has('bulan_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('bulan_name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="nominal_name" class="form-label">Target</label>
                <input type="text" class="form-control" name="nominal_name" value="{{old('nominal_name')}}" id="nominal_name" placeholder="Nominal Rupiah">
                <input type="hidden" id="nominal_name_hidden" name="nominal_name_hidden">
                @if ($errors->has('nominal_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('nominal_name')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var displayInput = document.getElementById('nominal_name');
        var hiddenInput = document.getElementById('nominal_name_hidden');
        
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
</script>

  

  