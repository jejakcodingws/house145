<style>
  .menu-master-cafe {
    background-color:darkslategray;
    width: 100%;
  }

  .list-menu {
    display: flex;
    padding: 8px;
    gap: 25px;
  }
  .list-menu a {
    background-color: blue;
    color: white;
    padding: 5px;
    font-size: 12px;
    display: flex;
    border-radius: 5px;
  }

  .list-menu a:hover{
    background-color:cadetblue;
  }

  .div-konten-invoice {
    padding: 10px;
  }
</style>
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid menu-master-cafe">
        <div class="row  ">
          <div class="">
          <nav class="">
          <div class="container-fluid list-menu">
          <a class=" nav-link {{(Request::segment(1) == 'invoice') ? 'active' : '' }} " style="gap:2px" href="{{url('cafe145/master-menu/invoice')}}"> 
          <span><i class="fas fa-file-invoice fa-lg"></i></span>Invoice</a>
          <a href="{{route('form-invoice')}}" class="navbar-brand" style="gap:2px"> <span><i class="fas fa-plus-square fa-lg"></i> </span> Form input invoice</a>
          </div>
          </nav>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="div-konten-invoice">
      @yield('konten-invoice')
    </div>

    <div class="">
        @yield('konten-form-invoice')
    </div>
    
</div>

