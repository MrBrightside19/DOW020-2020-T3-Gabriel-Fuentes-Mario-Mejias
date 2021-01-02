@extends('layouts/master')
@section('contenido-principal')
    
    <div class="container-fluid pt-5 bodyy">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-img-top img-fluid" src="{{asset('images/a250.jpg')}}" height="300" alt="Mercedes Benz A250">
                        <br>
                        <h5 class="card-title">Mercedes Benz A250</h5>                    
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Leer más...
                        </button>

                        <div class="accordion" id="auto1">
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#auto1">
                                <p class="text-justify">
                                    El Mercedes Clase A es uno de los modelos más importantes en la actual gama de productos de la firma alemana. A lo largo de los años ha pasado por diferentes fases. En sus orígenes la Clase A de Mercedes se ubicaba dentro del segmento B. Un modelo utilitario de revolucionario concepto que estaba principalmente pensado para un uso urbano.
                                </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <!-- Separación-->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-img-top img-fluid" src="{{asset('images/tucson.jpg')}}" height="300" alt="Hyundai Tucson">
                        <br>
                        <h5 class="card-title">
                            Hyundai Tucson CRDI
                        </h5>
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            Leer más...
                        </button>
                        <div class="accordion" id="auto2">
                            <div id="collapse2" class="collapse" data-parent="#auto2">
                                <p class="text-justify">
                                    El Hyundai Tucson, Se trata de un todoterreno que mide 4,48 metros de longitud, 1,85 metros de anchura y 1,65 metros de altura.
                                </p>
                                <p class="text-justify">
                                    este todoterreno cuenta con un motor diesel 1.6 CRDi de 116 CV con caja de cambios manual y tracción delantera.
                                </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
            <!-- Separación-->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-image-top img-fluid" src="{{asset('images/impreza.jpg')}}" alt="Subaru Impreza">
                        <br>
                        <h5 class="card-title">Subaru Impreza</h5>
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#auto3" aria-expanded="false" aria-controls="collapse3">
                            Leer más...
                        </button>
                        <div class="accordion" id="auto3">
                            <div id="auto3" class="collapse" data-parent="#auto3">
                                <p class="text-justify">
                                    El Subaru Impreza es un automóvil de turismo del segmento C producido por el fabricante japonés Subaru desde el año 1992.
                                </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Separación FILA -->  

        <div class="row mt-3">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-image-top img-fluid" src="{{asset('images/audi.jpg')}}" alt="Cavani">
                        <br>
                        <h5 class="card-title">Audi A6</h5>
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Leer más...
                        </button>
                        <div class="accordion" id="auto4">
                            <div id="collapse3" class="collapse" data-parent="#auto4">
                                <p class="text-justify">
                                    El frente del A6 Sedan sorprende con progresividad a primera vista, luciendo desde su amplia parrilla Singleframe y entradas de aire transversales con deportivas rejillas cromadas hasta el delgado diseño de sus focos. La línea de cintura refinada con curvas poderosas que se traza sobre los pasos de rueda acentúa los genes quattro. Los retrovisores exteriores se posan con un estilo deportivo sobre el marco de la puerta. Y la fluida línea del techo propia de los modelos Coupé desemboca elegantemente en la parte trasera tridimensional, que cuenta con rejillas características de aspecto de aluminio.                            </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Separación-->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-image-top img-fluid" src="{{asset('images/jeep.jpg')}}" alt="Cavani">
                        <br>
                        <h5 class="card-title">Jeep Wrangler
                        </h5>
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Leer más...
                        </button>
                        
                        <div class="accordion" id="auto5">
                            <div id="collapse4" class="collapse" data-parent="#auto5">
                                <p class="text-justify">
                                    El diseño de Wrangler es audaz y robusto. El techo rígido de 3 piezas es fácilmente desmontable para que tengas la oportunidad de traer más de lo de “afuera hacia adentro”. El nuevo Jeep Wrangler es el único 4×4 del mercado, diseñado y construido para una mayor libertad.
                                </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Separación-->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <img class="card-image-top img-fluid" src="{{asset('images/wrx.jpg')}}" alt="Cavani">
                        <br>
                        <h5 class="card-title">Subaru WRX STI</h5>
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#auto5" aria-expanded="false" aria-controls="collapse4">
                            Leer más...
                        </button>
                        
                        <div class="accordion" id="auto5">
                            <div id="auto5" class="collapse" data-parent="#auto5">
                                <p class="text-justify">
                                    El WRX STI es un ícono. Gracias al motor Subaru Boxer Turbo y la tecnología Symmetrical AWD con DCCD, notarás desde el encendido su performance pensado en máximo desempeño y velocidad.
                                </p>
                                <button class="btn btn-primary btn-block">
                                    Cotizar  
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class="text-light">Licenciado por:</h3>
        <div class="row">
            <div class="col-12 col-lg-3">
                <img src="{{asset('/images/hh.png')}}" alt="Licenciado por Hyundai" width="300px" height="180">
            </div>
            <div class="col-12 col-lg-3">
                <img src="{{asset('/images/ss.png')}}" alt="Licenciado por Subaru" width="300px" >
            </div>
            <div class="col-12 col-lg-3">
                <img src="{{asset('/images/mb.png')}}" alt="Licenciado por Subaru" width="250px"height="160" >
            </div>
            <div class="col-12 col-lg-3">
                <img src="{{asset('/images/aa.png')}}" alt="Licenciado por Subaru" width="300px" >
            </div>
        </div>
        <div class="row bg-primary text-light">
            <div class="col-12 ">
                <h4 class="col-12">Redes Sociales:</h4>
                <h4 class="pl-5"><i class="fab fa-instagram"></i><i class="fad fa-at pl-3"></i>Rentcarz</h4>
                <h4 class="pl-5"><i class="fab fa-facebook-square pr-3"></i>RentCarz Oficial</h4>
                <h4 class="pl-5"><i class="fab fa-twitter-square pr-3"></i>RentCarz Oficial</h4>
                <h4 class="pl-5"><i class="fas fa-envelope pr-3"></i>contacto<i class="fas fa-at"></i>rentCarz.cl</h4>
            </div>
        </div>
        </div>
    </div>
@endsection
