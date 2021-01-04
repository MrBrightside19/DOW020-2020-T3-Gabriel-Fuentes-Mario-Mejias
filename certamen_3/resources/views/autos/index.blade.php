@extends('layouts/master')
@section('contenido-principal')
<div class="container-fluid vh-100 d-flex flex-column pt-2 bodyy">
    <br>
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2 text-center">
            <h3 class="text-light"><i class="fas fa-cars"></i>Gestión de Autos <i class="fas fa-cars"></i></h3>
            <p class="text-light">
                Usted puede agregar, modificar y eliminar Autos.
            </p>
        </div>
    </div>
    <br>
    
    <!-- FORMULARIO -->
    @if (Gate::allows('listar-usuarios'))
    <div class="row bg-primary">
        <div class="col-5 offset-lg-1">
            <form method="POST" action="{{route('autos.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header text-center text-light bg-secondary">
                        <i class="fas fa-car"></i>
                        Datos del Vehículo
                        <i class="fas fa-car"></i>
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
                        <div class="form-row">
                            <div class="col-md-6 form-group" >
                                <label for="patente" class="col-form-label ">Patente(con guiones):</label>
                                <input type="text" id="patente" name="patente" class="form-control @error('patente') is-invalid @enderror" value="{{old('patente')}}">
                            </div>
                            
                            
                            <div class="col-md-6 form-group">
                                <label for="anio" class="col-form-label ">Año:</label>
                                <input type="number" id="anio" name="anio" class="form-control @error('anio') is-invalid @enderror" value="{{old('anio')}}">
                            </div>
                            
                        </div>
                        <div class="form-row ">
                            <div class="col-md-6 form-group">
                                <label for="imagen" class="col-form-label">Imagen:</label>
                                <input type="file" id="imagen" name="imagen" class="form-control" required>
                                
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tipovehiculo" class="col-form-label">Marca y Modelo:</label>
                                <select name="tipovehiculo" class="form-control">
                                    <option value="">Seleccione una opcion... </option>
                                    @foreach ($tiposvehiculos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->marca}}/{{$tipo->modelo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group ">
                                <label>Transmisión</label>
                                <br>
                                <div class="col-4 offset-1 pt-2">
                                    <input value="b" type="radio" class="form-check-input" name="transmision" id="transmision2" checked>
                                    <label for="transmision2" class="form-check-label">Manual</label>
                                </div>  
                                <div class="col-4 offset-1 pt-2">    
                                    <input value="a" type="radio" class="form-check-input" name="transmision" id="transmision1">
                                    <label for="transmision1" class="form-check-label">Automático</label>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-row">
                            
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Agregar</button>
                            </div>
                            
                                <div class="col-12 col-md-6 ">
                                    {{-- <button  class="btn btn-primary btn-block" ><i class="fas fa-cogs" data-toggle="modal" data-target="#tipo_vehiculo" ></i> Gestionar Tipo Vehiculo</button> --}}
                                    <i class="fas fa-cogs btn btn-primary btn-block" data-toggle="modal" data-target="#tipo_vehiculo">Agregar Vehiculo</i>
                                </div>
                                
                            

                        </div>
                    </div>
                </div>
            </form>
        </div> 
        {{-- TERMINA FORMULARIO
        EMPIEZA TABLA 1 TIPOVEHICULO --}}
        <div class="col-4">
            <div class="table-responsive ">
                <table  class="table table-bordered table-primary"  data-toggle="table" data-search="true" data-show-search-button="true" data-pagination="true">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">Tipo Vehiculo</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($tiposvehiculos as $tipo)
                            
                                
                                <tr>
                                    <td class="text-center">{{$tipo->marca}} {{$tipo->modelo}}</td>
                                    <td class="text-center ">
                                        <div class="d-flex justify-content-center">
                                        {{-- boton modificar tipo vehiculo --}}
                                        <i class="fas fa-cogs btn btn-primary mb-2 mx-1" data-toggle="modal" data-target="#modificar_vehiculo{{$tipo->id}}"></i>
                                        {{-- /boton modificar tipo vehiculo --}}
                                        {{-- boton eliminar tipo vehiculo --}}
                                        <form method="POST" action="{{route('tipos.destroy',$tipo->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="fas fa-trash btn btn-danger mx-1" data-toggle="tooltip" data-placement="top" title="Eliminar"></button>
                                        </form>
                                        {{-- boton eliminar tipo vehiculo --}}
                                        
<div class="modal fade" id="modificar_vehiculo{{$tipo->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h4 >Modificar Tipo Vehiculo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fas fa-times text-light"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('tipos.update',$tipo->id)}}">
                    @csrf  
                    @method('put') 
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="marca" class="col-form-label ">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-control" value="{{$tipo->marca}}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="modelo" class="col-form-label ">Modelo</label>
                            <input type="text" id="modelo" name="modelo" class="form-control" value="{{$tipo->modelo}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 form-group">
                            <label for="motor" class="col-form-label ">Motor</label>
                            <input type="text" id="motor" name="motor"class="form-control" value="{{$tipo->motor}}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="puertas" class="col-form-label ">Nº Puertas</label>
                            <input type="number" id="puertas" name="puertas"class="form-control" value="{{$tipo->puertas}}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="clase" class="col-form-label ">Clase</label>
                            <input type="text" id="clase" name="clase" class="form-control" value="{{$tipo->clase}}" required>
                        </div>
                        <div class="col-12 col-md-7  form-group">
                            <label for="precio" class="col-form-label ">Precio</label>
                            <input type="number" id="precio" name="precio"class="form-control" value="{{$tipo->precio}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-check"> 
                            <br>
                            <label>Tipo Combustible:</label>
                            <br>
                            <div class="col-md-6 form-group">

                                    <div class="col-8 offset-2 form-check">
                                        <input value="b" type="radio" class="form-check-input" name="combustible" @if ($tipo->combustible == 'b') checked @endif id="combustible-1{{$tipo->id}}">
                                        <label for="combustible-1{{$tipo->id}}" class="form-check-label">Bencina</label>
                                        <br>
                                        <input value="d" type="radio" class="form-check-input" name="combustible" @if ($tipo->combustible == 'd') checked @endif id="combustible-2{{$tipo->id}}">
                                        <label for="combustible-2{{$tipo->id}}" class="form-check-label">Diesel</label>
                                        <br>
                                        <input value="h" type="radio" class="form-check-input" name="combustible" @if ($tipo->combustible == 'h') checked @endif id="combustible-3{{$tipo->id}}">
                                        <label for="combustible-3{{$tipo->id}}" class="form-check-label">Hibrido</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Agregar</button>         
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </td>
        
        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
    @endif  
    
    <!-- FORMULARIO -->
    <div class="row bg-primary">
        <div class="col-12 col-lg-10 offset-1  pt-4 pt-lg-0 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-primary" data-toggle="table" data-search="true" data-show-search-button="true" data-pagination="true">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center" scope="col" width="20px"><b>Nº</b></th>
                            <th class="text-center" scope="col">Marca/Modelo</th>
                            <th class="text-center" scope="col">Patente</th>
                            <th class="text-center" scope="col">Estado</th>
                            <th class="text-center" scope="col">Año</th>
                            <th class="text-center" scope="col">Clase</th>
                            <th class="text-center" scope="col">Tipo Transmision</th>
                            <th class="text-center">Tipo Combustible</th>
                            <th class="text-center">Opciones</th>
                            
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($autos as $auto)
                            
                            <tr>
                                <th class="text-center" scope="row">{{$auto->id}}</th>
                                <td class="text-center">{{$auto->tiposvehiculo != null ? $auto->tiposvehiculo->marca:'Sin Marca ni modelo'}} </td>
                                <td class="text-center">{{$auto->patente}}</td>
                                <td class="text-center">
                                    
                                    @if ($auto->estado=='d')
                                        Disponible
                                        @else 
                                            @if ($auto->estado=='a')
                                                Arrendado
                                            @else 
                                                @if ($auto->estado=='m')
                                                    Mantenimiento
                                                @else 
                                                    De Baja
                                                    
                                                @endif
                                                
                                            @endif
                                    
                                    @endif
                                
                                </td>
                                <td class="text-center">{{$auto->anio}}</td>
                                <td class="text-center">{{$auto->tiposvehiculo != null? $auto->tiposvehiculo->clase:'Sin Clase'}}</td>
                                <td class="text-center">
                                    @if ($auto->transmision == 'a')
                                        Automatico
                                    @else
                                        Manual
                                    @endif
                                </td>
                                <td  class="text-center">
                                    @if ($auto->tiposvehiculo != null)
                                        @if ($auto->tiposvehiculo->combustible == 'b')
                                            Bencina
                                        @else
                                            @if ($auto->tiposvehiculo->combustible == 'd')
                                                Diesel
                                            @else 
                                                Híbrido
                                            @endif
                                        @endif
                                    @else 
                                        Sin Combustible
                                        
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                    {{-- boton modificar auto --}}
                                    @if($auto->estado != 'a')
                                    <i class="fas fa-cogs btn btn-primary" data-toggle="modal" data-target="#modificar_auto{{ $auto->id }}"></i>
                                    @endif
                                    {{-- /boton modificar auto --}}
@if (Gate::allows('listar-usuarios'))
{{-- Modificar Auto Admin--}}
<div class="modal fade" id="modificar_auto{{$auto->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h4>Modificar Auto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fas fa-times text-light"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('autos.update', $auto->id )}}" enctype="multipart/form-data">
                    
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="patente" class="col-form-label">Patente</label>
                                <input type="text" id="patente" name="patente" class="form-control" value="{{$auto->patente }}" >
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label for="anio" class="col-form-label">Año</label>
                                <input type="text" id="anio" name="anio" class="form-control" value="{{$auto->anio }}" >
                            </div>
                            
                        </div>
                        <div class="form-row ">
                            <div class="col-md-6 form-group">
                                <label for="imagen" class="col-form-label">Imagen</label>
                                <input type="file" id="imagen" name="imagen" class="form-control" >
                                
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tipovehiculo" class="col-form-label">Marca y Modelo</label>
                                <select name="tipovehiculo" class="form-control">
                                    <option value="{{$auto->tiposvehiculo !=null ?$auto->tiposvehiculo->id:'-1'}}">Seleccione una opcion... </option>
                                    @foreach ($tiposvehiculos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->marca}}/{{$tipo->modelo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group ">
                                <label>Transmisión</label>
                                <br>
                                <div class="col-4 offset-1 pt-2">    
                                    <input value="a" type="radio" class="form-check-input" name="transmision" id="transmision1{{$auto->id}}" @if ($auto->transmision == 'a') checked  @endif>
                                    <label for="transmision1{{$auto->id}}" class="form-check-label">Automático</label>
                                </div>
                                
                                <div class="col-4 offset-1 pt-2">
                                    <input value="b" type="radio" class="form-check-input" name="transmision" id="transmision2{{$auto->id}}" @if ($auto->transmision == 'b') checked  @endif> 
                                    <label for="transmision2{{$auto->id}}" class="form-check-label">Manual</label>
                                </div>  
                            </div>
                    
                            <div class="col-md-6 form-group ">
                                <label class="form-check-label">Estado</label>
                                <div class="col-6 pt-3">   
                                    <input value="d" type="radio" class="form-check-input" name="estado" checked id="estado1{{$auto->id}}" @if ($auto->estado == 'd') checked  @endif>
                                    <label for="estado1{{$auto->id}}" class="form-check-label">Disponible</label>
                                </div>
                                
                                <div class="col-6  pt-3">    
                                    <input value="m" type="radio" class="form-check-input" name="estado" id="estado3{{$auto->id}}" @if ($auto->estado == 'm') checked  @endif>
                                    <label for="estado3{{$auto->id}}" class="form-check-label">Mantenimiento</label>
                                </div>
                                
                            </div>
                        </div>
                    

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Modificar</button>        
                            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>  
</div>
@else 

<div class="modal fade" id="modificar_auto{{$auto->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h4>Modificar Auto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fas fa-times text-light"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('autos.update', $auto->id )}}">
                    @csrf
                    @method('put')
                    <div class="col-md-6 form-group ">
                        <label class="form-check-label">Estado</label>
                        <div class="col-6 pt-3">   
                            <input value="d" type="radio" class="form-check-input" name="estado" checked id="estado1" @if ($auto->estado == 'd') checked  @endif>
                            <label for="estado1" class="form-check-label">Disponible</label>
                        </div>
                        
                        <div class="col-6  pt-3">    
                            <input value="m" type="radio" class="form-check-input" name="estado" id="estado3" @if ($auto->estado == 'm') checked  @endif>
                            <label for="estado3" class="form-check-label">Mantenimiento</label>
                        </div>
                        
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modificar</button>        
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endif
{{-- boton mostrar auto --}}
<i class="far fa-eye btn btn-info mx-1" data-toggle="modal" data-target="#mostrar_auto{{ $auto->id }}"></i>
{{-- /boton mostrar auto --}}
{{-- Mostrar Fotos Autos --}}
<div class="modal fade" id="mostrar_auto{{ $auto->id }}">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4>Visualizacion</h4>
<button type="button" class="close" data-dismiss="modal">
<span>X</span>
</button>
</div>
<div class="modal-body">

<img src="{{Storage::url($auto->imagen)}}" alt="Responsive image" class="img-fluid">   

</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
@if ($auto->estado != 'a')
<form method="POST" action="{{route('autos.destroy',$auto->id)}}">
    @csrf
    @method('delete')
    <button class="fas fa-trash btn btn-danger" data-toggle="tooltip" data-placement="top" title="Dar de baja vehiculo"></button>
</form>
@endif
</div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
    </div>
    <div class="row bg-primary">
        <div class="col-12">
            <h3 class="text-light">Licenciado por:</h3>
        </div>
        <div class="col-10 offset-1 col-lg-3 offset-lg-0 bg-primary">
            <img src="{{asset('/images/hh.png')}}" alt="Licenciado por Hyundai" width="300px" height="180">
        </div>
        <div class="col-10 offset-1 col-lg-3 offset-lg-0 bg-primary">
            <img src="{{asset('/images/ss.png')}}" alt="Licenciado por Subaru" width="300px" >
        </div>
        <div class="col-8 offset-2 col-lg-3 offset-lg-0 bg-primary">
            <img src="{{asset('/images/mb.png')}}" alt="Licenciado por Mercedes Benz" width="250px"height="160" >
        </div>
        <div class="col-10 offset-1 col-lg-3 offset-lg-0 bg-primary">
            <img src="{{asset('/images/aa.png')}}" alt="Licenciado por Audi" width="300px">
        </div>
    </div>
</div>  


<div class="modal fade" id="tipo_vehiculo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h4 >Gestionar Tipo Vehiculo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fas fa-times text-light"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('tipos.store')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="marca" class="col-form-label ">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="modelo" class="col-form-label ">Modelo</label>
                            <input type="text" id="modelo" name="modelo" class="form-control"  required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 form-group">
                            <label for="motor" class="col-form-label ">Motor</label>
                            <input type="text" id="motor" name="motor"class="form-control"  required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="puertas" class="col-form-label ">Nº Puertas</label>
                            <input type="number" id="puertas" name="puertas"class="form-control"  required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="clase" class="col-form-label ">Clase</label>
                            <input type="text" id="clase" name="clase" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-7  form-group">
                            <label for="precio" class="col-form-label ">Precio</label>
                            <input type="number" id="precio" name="precio"class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-check"> 
                            <br>
                            <label>Tipo Combustible:</label>
                            <br>
                            <div class="col-md-6 form-group">
                            
                                {{-- <div class="row"> --}}
                                    <div class="col-8 offset-2">
                                        <input value="b" type="radio" class="form-check-input" name="combustible" id="combustible1">
                                        <label for="combustible1" class="form-check-label">Bencina</label>
                                        <br>
                                        <input value="d" type="radio" class="form-check-input" name="combustible" id="combustible2">
                                        <label for="combustible2" class="form-check-label">Diesel</label>
                                        <br>
                                        <input value="h" type="radio" class="form-check-input" name="combustible" id="combustible3">
                                        <label for="combustible3" class="form-check-label">Hibrido</label>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Agregar</button>         
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>  
</div>

@endsection