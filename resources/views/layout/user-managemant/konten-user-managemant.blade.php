
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card shadow mb-4">
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

  

  