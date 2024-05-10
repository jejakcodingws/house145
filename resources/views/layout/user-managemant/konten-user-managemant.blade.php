
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                    <span><i class="fa-solid fa-gears"></i></span>    
                                    Master Data User</h6>
                                </div>
                                <div class="card-body">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <div class="container-fluid">
                                        <div class="navbar-menu navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-list">
                                            <li class="nav-item">
                                            <a class="nav-link active"  href="{{route('add-users')}}">
                                            <span><i class="fa-solid fa-user-plus"></i></span>    
                                            Tambah Data users</a>
                                            </li>
                                            <li class="nav-item"  data-bs-toggle="modal" data-bs-target="#modalinputtarget" >
                                            <a class="nav-link active">
                                            <span><i class="fa-solid fa-user-plus"></i></span>    
                                            Input Target</a>
                                            </li>
                                        
                    
                                        </ul>
                                       
                                       
                                        </div>
                                    </div>
                                    </nav>

                                    <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($datauser as $d)
                                        <tr>
                                        <th scope="row">{{$loop -> iteration}}</th>
                                        <td>{{$d -> name}}</td>
                                        <td>{{$d -> email}}</td>
                                        <td>{{$d -> level}}</td>
                                
                                        </tr>
                                    @endforeach
                                        
                                       
                                    </tbody>
                                                                                
                                                                                </table>

                               

                                </div>
                            </div>
                        </div>
                                <div class="p-5">
                                    @yield('konten-tambah-data-user')
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
                <label for="for_kode_target" class="form-label">Kode Target</label>
                <input type="text" class="form-control" name="for_kode_target" value="{{old('for_kode_target')}}" id="for_kode_target" placeholder="cth: tg-mei">
                @if ($errors->has('for_kode_target'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_kode_target')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="for_bulan" class="form-label">Bulan</label>
                <input type="text" class="form-control" name="for_bulan" value="{{old('for_bulan')}}" id="for_bulan" placeholder="input bulan saja">
                @if ($errors->has('for_bulan'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_bulan')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="for_nominal" class="form-label">Target</label>
                <input type="text" class="form-control" name="for_nominal" value="{{old('for_nominal')}}" id="for_nominal" placeholder="Nominal Rupiah">
                @if ($errors->has('for_nominal'))
                  <div style="background-color: red;" class="badge text-bg-danger">{{$errors->first('for_nominal')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

  

  