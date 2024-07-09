
<div class="content-wrapper" >

<div class="card-body">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul  style="gap: 7px; font-size:12px;" class="navbar-nav me-auto mb-2 mb-lg-0">
           
            <li class="nav-item">
            <a class="nav-link  active {{ request()->is('site-karyawan-145/create') ? 'bg-success' : '' }} " aria-current="page"  href="{{url('cafe145/master-menu/invoice')}}"><span><i class="fa-solid fa-file"></i></span>Cetak Invoice</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
                                        
       
</div>

    <div class="div-konten-invoice" style="padding: 10px;">
      @yield('konten-invoice')
    </div>

    <div class="">
        @include('layout.layout-cafe.form-invoice')
    </div>

    
</div>

