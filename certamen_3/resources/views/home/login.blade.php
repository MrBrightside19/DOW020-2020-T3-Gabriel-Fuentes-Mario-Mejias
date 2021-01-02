<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Iniciar Sesión</title>
</head>
<body class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <header>
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('images/car1.jpg')}}" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/car2.jpg')}}" class="d-block w-100">
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <div class="container-fluid vh-100 d-flex flex-column justify-content-lg-center pt-5">
        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4">
                <div class="card">
                    <div class="card-header bg-primary text-light text-center">
                        <i class="fas fa-user"></i>
                        Inicio De Sesión
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('usuarios.login') }}">
                            @csrf
                            <div class="form-group col-12">
                                <label for="email">Email:</label><br>
                                <input type="email" id="email" placeholder="ejemplo@usm.cl" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-12">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" id="password" class="form-control" name="password"required>

                                    

                                </div>
                            </div>
    
                            <div class="form-group col-12 text-right">
                                <div class="row">
                                    <div class="col col-lg-4 offset-lg-8">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Ingresar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>