@extends('layouts.master')
@section('contenido-principal')
    
    <div class="container-fluid vh-100 d-flex flex-column pt-2 bodyy">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 text-center">
                <h3 class="text-light">Solicitud de Auto</h3>
            </div>
        </div>
        <!-- FORMULARIO -->
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <form method="POST" action="{{route('arriendos.store')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="card">
                        <div class="card-header text-center text-light bg-secondary">
                            <i class="fas fa-cars"></i>
                            Ahora, encontremos el alquiler perfecto para ti
                            <i class="fas fa-cars"></i>
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
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="fechar">Fecha Recogida:</label>
                                        <input type="date" id="fechar" name="fechar" class="form-control @error('fechar') is-invalid @enderror" value="{{old('fechar')}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="horar">Hora Recogida:</label>
                                        <input type="time" value="00:00" id="horar" name="horar" class="form-control @error('horar') is-invalid @enderror" value="{{old('horar')}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="fechae">Fecha Entrega:</label>
                                        <input type="date" id="fechae" name="fechae" class="form-control @error('fechae') is-invalid @enderror" value="{{old('fechae')}}" value="{{old('fechae')}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="horae">Hora Entrega:</label>
                                        <input type="time" value="00:00" id="horae" name="horae" class="form-control @error('horae') is-invalid @enderror" value="{{old('horae')}}">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-md-6 form-group">
                                        <label for="imagenv" class="col-form-label">Imagen Entrega</label>
                                        <input type="file" id="imagenv" name="imagenv" class="form-control" >
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6"> 
                                        <label for="auto">Auto:</label>
                                        <select name="auto" id="entrega" class="form-control col-12 ">
                                            <option selected>Seleccione una opción...</option>
                                            @foreach ($autos as $auto)
                                                @if ($auto->tiposvehiculo != null && $auto->estado == 'd')
                                                    
                                                <option value="{{$auto->id}}">{{$auto->tiposvehiculo->marca}}/{{$auto->tiposvehiculo->modelo}} - ${{$auto->tiposvehiculo->precio}} </option>
                                                @endif
                                            
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label for="cliente">Clientes:</label>
                                        <select class="form-control col-12 " id="cliente" name="cliente">  
                                            <option selected>Seleccione una opción...</option>
                                            @foreach ($clientes as $cliente)
                                                
                                            <option value="{{$cliente->id}}">{{$cliente->nombres}} {{$cliente->apellidos}}</option>
                                            
                                            @endforeach      
                                        </select>               
                                    </div>
                                </div>
                                <br>

                                <div class="row">       
                                    <div class="pt-2 col-12">
                                        <button type="submit" class="btn btn-primary btn-block"> Solicitar <i class="pl-2 fas fa-plus-square"></i></button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <!-- FORMULARIO -->
        <br>
        <!-- TABLA -->
        <div class="row bodyy mt-3">
            <div class="col-12 col-lg-10 offset-lg-1 bodyy">
                <div class="table-responsive">
                    <table class="table table-bordered table-primary" data-toggle="table" data-search="true" data-show-search-button="true" data-pagination="true">
                        <thead class="bg-secondary">
                            <tr>
                                <th class="text-center"scope="col" width="20px"><b>Nº</b></th>
                                <th class="text-center"scope="col">Solicitudes</th>
                                <th class="text-center"scope="col">Cliente</th>
                                <th class="text-center"scope="col">Fecha y Hora Recogida</th>
                                <th class="text-center">Fecha y Hora Entrega</th>
                                <th class="text-center"scope="col">Estado</th>
                                <th class="text-center"scope="col">Valor Final</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($arriendos as $num=>$arriendo)
                                <tr>
                                    <th class="text-center" scope="row">{{$arriendo->id}}</th>                                    
                                    <td class="text-center">{{$arriendo->auto->tiposvehiculo != null ? $arriendo->auto->tiposvehiculo->marca:'Sin Marca' }} / {{$arriendo->auto->tiposvehiculo != null ? $arriendo->auto->tiposvehiculo->modelo:'Sin Modelo' }}</td>
                                    <td class="text-center">{{$arriendo->cliente->nombres}} {{$arriendo->cliente->apellidos}}</td>
                                    <td class="text-center">{{date('d-m-Y',strtotime($arriendo->fecha_origen))}} - {{date('H:i',strtotime($arriendo->hora_origen ))}}</td>
                                    <td class="text-center">{{date('d-m-Y',strtotime($arriendo->fecha_destino))}} - {{date('H:i',strtotime($arriendo->hora_destino)) }}</td>
                                    <td class="text-center">{{$arriendo->estado == 'v'? 'Vigente':'Finalizado'}} </td>
                                    <td class="text-center">{{"$".number_format($arriendo->valorfinal,0,".",".")}} </td>
                                    <td class="text-center">
                                        
                                        {{-- boton estado arriendo --}}
                                        <i class="fas fa-trash btn btn-danger" data-toggle="modal" data-target="#estado_arriendo{{$arriendo->id}}" title="Finalizar arriendo"></i>
                                        {{-- /boton estado arriendo --}}
{{-- Modificar Auto --}}
<div class="modal fade" id="estado_arriendo{{$arriendo->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h4>Finalizar Arriendo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span><i class="fas fa-times text-light"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('arriendos.update', $arriendo->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="fechar">Fecha Recogida:</label>
                            <input type="date" id="fechar" name="fechar" class="form-control" value="{{$arriendo->fecha_origen}}" disabled required>
                        </div>
                        <div class="col-lg-6">
                            <label for="horar">Hora Recogida:</label>
                            <input type="time" id="horar" name="horar" class="form-control" value="{{$arriendo->hora_origen}}" disabled required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="fechae">Fecha Entrega:</label>
                            <input type="date" id="fechae" name="fechae" class="form-control" value="{{$arriendo->fecha_destino}}" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="horae">Hora Entrega:</label>
                            <input type="time" id="horae" name="horae" class="form-control" value="{{$arriendo->hora_destino}}" required>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col-md-6 form-group">
                            <label for="imagenf" class="col-form-label">Imagen Finalizado</label>
                            <input type="file" id="imagenf" name="imagenf" class="form-control" required>
                            
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Finalizar</button>        
                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Salir</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>  
</div>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row-12">
                <div class="col-12">
                    <h3 class="text-light">Licenciado por:</h3>
                </div>
            </div>
            <br>
            <div class="row ">
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
            <br>
            <div class="row bg-primary text-light"> 
                <div class="col-8 offset-2 col-xl-12">
                    <h4 class="col-12">Redes Sociales:</h4>
                    <h4 class="pl-5"><i class="fab fa-instagram"></i><i class="fad fa-at pl-3"></i>Rentcarz</h4>
                    <h4 class="pl-5"><i class="fab fa-facebook-square pr-3"></i>RentCarz Oficial</h4>
                    <h4 class="pl-5"><i class="fab fa-twitter-square pr-3"></i>RentCarz Oficial</h4>
                    <h4 class="pl-5"><i class="fas fa-envelope pr-3"></i>contacto<i class="fas fa-at"></i>rentCarz.cl</h4>
                </div>
            </div>
        </div> 
        <!-- TABLA -->
    </div>
@endsection
