@extends('layouts.menu')
@section('content')
        

        
         <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" data-scroll="true" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          
          <h6 class="font-weight-bolder mb-0">Lista de clientes</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            <li class="nav-item dropdown pl-2 pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-2" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    
                <form action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  <button class="btn rounded-pill btn-outline-danger text-center" type="submit">Cerrar sesión</button>
                  
                </form>
                  </a>
                </li>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4 pt-5">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">inventory_2</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total de Registros</p>
                <h4 class="mb-0">{{$total}} 
                  @if($total > 1  || $total == 0)
                  registros 
                  @else 
                  registro 
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-xl-4 col-sm-6">
          <div class="card">
            <div class="card-body p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">close</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Registros Eliminados</p>
                <h4 class="mb-0">{{$eliminados}}
                @if($eliminados > 1 || $eliminados == 0)
                  registros 
                  @else 
                  registro 
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mb-4 mt-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card p-4">
  <div class="table-responsive">
    <table class="table align-items-center" id="myTable">
      <thead>
        <tr>
          

          <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apellido Paterno</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apellido Materno</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Correo</th>
          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>

      @foreach($registros as $reg)
        <tr>
          <td>
            

            <p class="text-center font-weight-bold mb-0">{{$reg->nombres}}</p>
          </td>
          <td>
            <p class="text-center font-weight-bold mb-0">{{$reg->apellido_paterno}}</p>
            
          </td>

          <td>
            <p class="text-center font-weight-bold mb-0">{{$reg->apellido_materno}}</p>
            
          </td>
          <td class="align-middle text-center text-sm">
            <span class="text-center font-weight-bold mb-0"> {{$reg->correo_electronico}}</span>
          </td>
          
          <td class="align-middle text-center">
             <a id="bCotizar" name="bCotizar" href="detalles/{{$reg->id}}"><button type="button" class="btn btn-info btn-sm">
              <span class="fa fa-edit"></span> Editar
              </button></a>

              <button type="button" class="btn btn-danger btn-sm" onclick="eliminarRegistro({{$reg->id}});">
              <span class="fa fa-trash"></span> Eliminar
              </button>
          </td>
        </tr>

        @endforeach

      
      </tbody>
    </table>
  </div>
</div>
         </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Edit by
                <a href="#" class="font-weight-bold" target="_blank">MAVI</a>.
              </div>
            </div>
            <div class="col-lg-6">
              
            </div>
          </div>
        </div>
      </footer>
    </div>


    <link rel="stylesheet" href="{{asset('assets/css/datatables.css')}}" />

 <script src="{{asset('assets/js/jquery3-5-1.js')}}"></script>
 <script src="{{asset('assets/js/datatables.js')}}"></script>

<script>
  
$(document).ready( function () {
  //$.noConflict();
$('#myTable').DataTable({

  "paging": true,
  "pageLength": 25,
  "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
  "order": [[1, 'desc']],
});


});
</script>


<script>
  function eliminarRegistro(id){

      $.ajax({
                url: 'eliminar',
                type: 'get',
                data: {'id':id},
                success: function(response) {
                    if(response.status == 200){
                      alert(response.message);
                      location.reload();

                    }else if(response.status == 400){
                      alert(response.message);
                    }
                },
                error: function(error) {
                    
                    console.log(error);
                }
            });

  }
</script>
@endsection
