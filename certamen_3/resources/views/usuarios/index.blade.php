@extends('layouts/master')
@section('contenido-principal')
    
<div class="container-fluid d-flex flex-column pt-2 bodyy">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2 text-center">
            <h3 class="text-light">Gestión de Usuarios</h3>
            <p class="text-light">
                Usted puede agregar, modificar y eliminar usuarios.
            </p>
        </div>
    </div>
    <!-- FORMULARIO -->

    <div class="row">
        <div class="col-12 col-lg-3 offset-lg-1">
            <div class="card">
                <div class="card-header text-center text-light bg-secondary">
                    <i class="fas fa-user"></i>
                    Formulario Usuario
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-body formulario">
                        {{-- Errores --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>Soluciones los siguientes problemas:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Errores --}}
                    <form method="POST" action="{{route('usuarios.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control col-12 col-lg-0 @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                            <br>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control col-12 col-lg-0 @error('apellido') is-invalid @enderror"  value="{{old('apellido')}}">
                            <br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="ejemplo@usm.cl" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}">
                            <br>
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" name="pass" class="form-control @error('pass') is-invalid @enderror"  value="{{old('pass')}}">
                            <br>
                            <div class="form-group ">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="rol" id="recordar" value="0">
                                    <label for="recordar"  class="form-check-label">Administrador</label>
                                    <br>
                                    <input type="radio" class="form-check-input" name="rol" id="recordar1" value="1">
                                    <label for="recordar1" class="form-check-label">Ejecutivo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-2 col-12 col-lg-8 offset-lg-2">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Agregar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FORMULARIO -->
        <!-- TABLA -->
        <div class="col-12 col-lg-7 pt-4 pt-lg-0">
            <div class="table-responsive">
                <table class="table table-bordered table-primary" data-toggle="table" data-search="true" data-show-search-button="true" data-pagination="true">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col" class="text-center" width="20px"><b>Nº</b></th>
                            <th scope="col" class="text-center">Nombre <i class="far fa-user"></i></th>
                            <th scope="col" class="text-center">Apellido <i class="far fa-user"></i></th>
                            <th scope="col" class="text-center">Correo <i class="far fa-at"></i></th>
                            <th scope="col" class="text-center">Tipo Usuario <i class="far fa-user-tag"></i></th>
                            <th scope="col" class="text-center">Estado<i class="far fa-user-tag"></i></th>
                            
                            <th class="text-center" >Opciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="text-center" scope="row">{{$usuario->id}}</td>
                                <td class="text-center">{{$usuario->nombre}}</td>
                                <td class="text-center">{{$usuario->apellido}}</td>
                                <td class="text-center">{{$usuario->email}}</td>
                                <td class="text-center">
                                    @if ($usuario->rol == 0) 
                                        Administrador
                                    @else
                                        Ejecutivo
                                    @endif
                                </td>
                                <td class="text-center">{{$usuario->activo?'Activo':'No Activo'}}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        @if (Auth::user()->id != $usuario->id)
                                            <form method="POST" action="{{route('usuarios.destroy',$usuario->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="fas fa-trash btn btn-danger align-item-self" data-toggle="tooltip" data-placement="top" title="Eliminar"></button>
                                            </form>
                                        @endif
                                        <a href="#" class="btn btn-info fas fa-cogs mx-1" data-toggle="modal" data-target="#modificar_usuario{{$usuario->id}}"></a>
                                        
                                        <form method="POST" action="{{route('usuarios.activar',$usuario->id)}}">
                                            @csrf
                                                
                                                @if (Auth::user()->id != $usuario->id)
                                                <button class="fas fa-user-{{$usuario->activo?'minus':'plus'}} btn btn-{{$usuario->activo?'warning':'success'}}" type="submit" data-toggle="tooltip" data-placement="top" title="{{$usuario->activo?'Deshabilitar':'Habilitar'}} Usuario"></button>
                                                @endif
        
                                        </form>
                                    </div>
                                </td>


{{-- Modificar usuario --}}
<div class="modal fade" id="modificar_usuario{{$usuario->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modificar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>X</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('usuarios.update', $usuario->id )}}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"  value="{{$usuario->nombre}}" required>
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control"  value="{{$usuario->apellido}}" required>
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control"  value="{{$usuario->email}}" required>
                            
                        </div>
                    </div>
                    
                    @if (Auth::user()->id != $usuario->id)
                    <div class="form-group ">
                        <div class="form-check">
                            
                            <input type="radio" class="form-check-input" name="rol" id="recordar{{$usuario->id}}" value="0"  @if ($usuario->rol == 0) checked  @endif>
                            <label for="recordar{{$usuario->id}}"  class="form-check-label">Administrador</label>
                            <br>
                        
                            <input type="radio" class="form-check-input" name="rol" id="recordar1{{$usuario->id}}" value="1" @if ($usuario->rol != 0)  checked  @endif>
                            <label for="recordar1{{$usuario->id}}" class="form-check-label">Ejecutivo</label>
                            
                        </div>
                    </div>
                    @endif
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modificar</button>         
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                    </div>


                </form>
                </div>
                <div class="modal-footer">
                    @if (Auth::user()->id == $usuario->id)
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button type="menu" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Desea cambiar la contraseña?
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <form action="{{route('usuarios.password',Auth::user()->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group col-md-12">
                                                    <label for="password">Contraseña</label>
                                                    <input type="password" id="password" name="password" class="form-control" required >
                                                    
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-primary">Modificar</button>         
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif
                </div>
        </div>
    </div>  
</div>




                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <h3 class="text-light text-center pl-5">Licenciado por:</h3>
        <br>
    </div>
    <hr>
    <div class="row">
        <br>
        <div class="col-12 col-md-6 col-lg-3 bg-primary">
            <img src="/images/hh.png" alt="Licenciado por Hyundai" width="300px" height="180">
        </div>
        <div class="col-12 col-md-6 col-lg-3 bg-primary">
            <img src="/images/ss.png" alt="Licenciado por Subaru" width="300px" >
        </div>
        <div class="col-12 col-md-6 col-lg-3 bg-primary">
            <img src="/images/mb.png" alt="Licenciado por Subaru" width="250px"height="160" >
        </div>
        <div class="col-12 col-md-6 col-lg-3 bg-primary">
            <img src="/images/aa.png" alt="Licenciado por Subaru" width="300px">
        </div>
    </div>
</div>
@endsection