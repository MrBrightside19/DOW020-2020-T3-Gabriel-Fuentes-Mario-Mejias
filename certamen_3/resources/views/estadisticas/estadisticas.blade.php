<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Estadisticas</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center mt-2">Detalle de Arriendos</h1>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center">Nº</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Fecha y Hora Origen</th>
                    <th class="text-center">Fecha y Hora Destino</th>
                    <th class="text-center">Valor Arriendo</th>
                </tr>
            </thead>
            
            @foreach ($tablaArriendos as $num=>$arriendo)
            <tr>
                <td>{{$num+1}}</td>
                <td>{{$arriendo['id']}}</td>
                <td class="text-center">{{$arriendo['estado'] == 'v'? 'Vigente':'Finalizado'}} </td>
                <td class="text-center">{{$arriendo['nombres']}} {{$arriendo['apellidos']}}</td>
                <td class="text-center">{{date('d-m-Y',strtotime($arriendo['fecha_o']))}} - {{date('H:i',strtotime($arriendo['hora_o'] ))}}</td>
                <td class="text-center">{{date('d-m-Y',strtotime($arriendo['fecha_d']))}} - {{date('H:i',strtotime($arriendo['hora_d'])) }}</td>
                <td class="text-center">{{"$".number_format($arriendo['valorfinal'],0,".",".")}} </td>
                
                
            </tr>
            @endforeach
            <tr>
                <td class="text-right pr-4" colspan="7">Total: {{"$".number_format($arriendo['total'],0,".",".")}}</td>
            </tr>
            <tbody>
                
            </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>