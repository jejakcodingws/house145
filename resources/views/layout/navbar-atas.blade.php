<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav navigasi-atas">
      <div>
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </div>
      <div class="nav-atas-side-kanan">
        <li class=""
        style="display: flex; justify-content:center; align-items:center;">
        <span class="p-2">Selamat Datang</span>
        <span 
        style="font-weight:bolder;">
        {{Auth::user()->name}}
        </span>
        </li>
        <li class="">
        
          <a href="{{route('login-site')}}" style="color: blue;" class="nav-link"><span><i class="fa-solid fa-door-open"></i></span>Logout</a>
        </li>
     
      </div>
    </ul>
  
  </nav>