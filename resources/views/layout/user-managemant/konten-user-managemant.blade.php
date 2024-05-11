
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
        @include('layout/flash-message')
                                <a href="{{route('user-manage')}}" >
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                    <span><i class="fa-solid fa-gears"></i></span>    
                                    Master Data User</h6>
                                </div>
                                </a>
                                <div class="card-body">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <div class="container-fluid">
                                        <div class="navbar-menu navbar-collapse" id="navbarSupportedContent">
                                        <ul style="gap: 5px;" class="navbar-nav me-auto mb-2  navbar-list">
                                        <li class="nav-item">
                                        <a href="{{ route('add-users') }}" class=" fw-bold nav-link {{ request()->is('add-users') ? 'bg-success' : '' }}">
                                            <span><i class="fa-solid fa-user-plus"></i></span>    
                                            Tambah Data users
                                        </a>
                                        </li>
                                            <li class="nav-item"   data-bs-toggle="modal" data-bs-target="#modalinputtarget" >
                                            <a class="nav-link fw-bold">
                                            <span><i class="fa-solid fa-money-bill-trend-up"></i></span>    
                                            Input Target</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link fw-bold {{ request()->is('Data-target') ? 'bg-success' : '' }} " href="{{route('data-target')}}">
                                            <span><i class="fa-solid fa-arrows-to-eye"></i></span>    
                                            Data Target</a>
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
                                        <th scope="col">Delete user</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($datauser as $d)
                                        <tr>
                                        <th scope="row">{{$loop -> iteration}}</th>
                                        <td>{{$d -> name}}</td>
                                        <td>{{$d -> email}}</td>
                                        <td>{{$d -> level}}</td>
                                        <td>
                                        <a href="{{route('delete-user', ['id' => $d->id])}}" class="btn" 
                                            onclick="return confirm('Apakah anda yakin ingin menghapus : {{$d-> name}} ?')">
                                            <i class="fa-solid fa-trash" style="color: #ed0707;"></i>
                                            </a>
                                        </td>
                                
                                        </tr>
                                    @endforeach
                                    <div class="p-2">
                                    @yield('konten-data-target')
                                    </div>
                                       
                                    
                                                                                
                   </table>
</tbody>
           
                                </div>
                            </div>
                        </div>
                                <div class="p-2">
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

  

  