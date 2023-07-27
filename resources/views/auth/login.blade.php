@extends('layouts.app')

@section('content')

 <!-- Content -->
<div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <div class="row mt-3">
                    <div class="col-12 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <img src="assets/img/logo/mavi-logo.svg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h4 class="font-weight-bolder text-center mt-2 mb-0">Inicio de sesión</h4>
                <form role="form" class="text-start" action="{{ route('login') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="{{ $errors->has('email') ? 'alert alert-danger' : '' }}">{!! $errors->first('email', '<span class="help-block">:message</span>') !!}</div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email"
                    name="email"
                    autofocus>
                  </div>
                  <div class="{{ $errors->has('password') ? 'alert alert-danger' : '' }}">{!! $errors->first('password', '<span class="help-block">:message</span>') !!}</div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control"
                      id="password"
                      name="password"
                      aria-describedby="password">
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn w-100 my-4 mb-2" style="background-color: #D61F1B; color: #fff;">Entrar</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>

    <!-- / Content -->
@endsection
