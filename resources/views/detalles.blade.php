@extends('layouts.menu')
@section('content')
        

        
         <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" data-scroll="true" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          
          <h6 class="font-weight-bolder mb-0">Editar Cliente</h6>
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
     
      <div class="row mb-4 mt-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card p-4">
                    <form id="form1">

                    @csrf
                        <div class="row">

                            <div class="col-md-12">
                            <h6 class="font-weight-bolder mb-3">Complete todos los campos</h6>

                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Nombres(s)</label>
                                    <input type="text" maxlength="240" onkeypress="return validarLetras(event)" value="{{$datos->nombres}}"  name="nombre" class="form-control"required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Apellido Paterno</label>
                                    <input type="text" maxlength="240" onkeypress="return validarLetras(event)" name="paterno" value="{{$datos->apellido_paterno}}" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Apellido Materno</label>
                                    <input type="text" maxlength="240" onkeypress="return validarLetras(event)" name="materno" value="{{$datos->apellido_materno}}" class="form-control" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label>Domicilio</label>
                                    <input type="text" maxlength="240" onkeypress="return validarDireccion(event)" name="domicilio" value="{{$datos->domicilio}}" class="form-control" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label>Correo</label>
                                    <input type="email" maxlength="240" onkeypress="return validarCorreo(event)" name="correo" value="{{$datos->correo_electronico}}" class="form-control" required>
                                </div>

                            </div>

                            
                        </div>



                    </form>









                </div>
            </div>


            <div class="col-md-12 mb-lg-0 mb-4">
						
						<div class="card mt-4" id="delete">
							<div class="card-body">
								<div class="d-flex align-items-center mb-sm-0 mb-4">
									<div class="w-50">
										<h5>Editar información</h5>
										<p class="text-sm mb-0">Una vez guardada la edición, la información anterior desaparecerá. ¿Está seguro?</p>
									</div>
									<div class="w-50 text-end">
										<a href="{{route('dashboard')}}"><button class="btn btn-outline-secondary mb-3 mb-md-0 ms-auto" type="button" name="button">Atrás</button></a>
										<button class="btn bg-gradient-success mb-0 ms-2" onclick="editarInfo({{$datos->id}});"name="Guardar">Guardar</button>
									</div>
								
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



 <script src="{{asset('assets/js/jquery3-5-1.js')}}"></script>


<script>
    function validarLetras(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        const char = String.fromCharCode(charCode);
        const letrasConAcentos = /[A-Za-záéíóúÁÉÍÓÚ ]/;

        return letrasConAcentos.test(char);
    }

    function validarCorreo(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        const char = String.fromCharCode(charCode);
        const letrasConAcentos = /[A-Za-z0-9.@-_]/;

        return letrasConAcentos.test(char);
    }

    function validarDireccion(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        const char = String.fromCharCode(charCode);
        const letrasConAcentos = /[A-Za-záéíóúÁÉÍÓÚ0-9# -_]/;

        return letrasConAcentos.test(char);
    }
</script>


<script>
 


    function editarInfo(id){
        

        // Obtener todos los campos del formulario como un array de objetos
        var formDataArray = $('#form1').serializeArray();
        formDataArray.push({ name: 'id', value: id });

        // Convertir array en una cadena serializada
        var fdata = $.param(formDataArray);


        

            $.ajax({
                url: '{{route('editar')}}',
                type: 'get',
                data: fdata,
                success: function(response) {
                    if(response.status == 200){
                    alert(response.message);
                    window.location.href = '/dashboard';

                    

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
