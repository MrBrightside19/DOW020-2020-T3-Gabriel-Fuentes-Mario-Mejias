<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arriendo;
use App\Models\Auto;
use App\Models\Cliente;
use App\Models\TipoVehiculo;
use Illuminate\Support\Carbon;
use App\Http\Requests\ArriendosRequest;
use Illuminate\Support\Facades\Storage;

use PDF;

class ArriendosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $arriendos = Arriendo::all();
        $autos = Auto::all();
        $clientes = Cliente::all();
        return view('arriendos.index',compact('arriendos','autos','clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArriendosRequest $request)
    {
        // dd($request->auto);
        $fechaEmision = Carbon::parse($request->fechar);
        $fechaExpiracion = Carbon::parse($request->fechae);
        $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);
        $autos = Auto::where('id',$request->auto)->value('tiposvehiculo_id');
        $precio = TipoVehiculo::where('id',$autos)->value('precio');
        
        $arriendos = new Arriendo();
        $arriendos->hora_origen = $request->horar;
        $arriendos->hora_origen = $request->horar;
        $arriendos->hora_destino = $request->horae;
        $arriendos->fecha_origen = $request->fechar;
        $arriendos->fecha_destino = $request->fechae;
        $arriendos->valorfinal = $diasDiferencia*$precio;
        $arriendos->estado = 'v';
        $arriendos->imagen_vigente = $request->imagenv->store('public/arriendos');
        $arriendos->auto_id = $request->auto;
        $arriendos->cliente_id = $request->cliente;
        $arriendos->save();
        
        
        $autos = Auto::where('id',$request->auto)->first();
        $autos->estado = 'a'; 
        // dd($autos);
        $autos->save(); 
        return redirect()->route('arriendos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arriendo $arriendo)
    {
        $arriendo->estado = 'f';
        $arriendo->imagen_finalizado = $request->imagenf->store('public/arriendos');
        $arriendo->save();

        $autos = Auto::where('id',$arriendo->id)->first();
        $autos->estado = 'd';
        $autos->save(); 

        return redirect()->route('arriendos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}

// ,'autos','clientes','arriendos'

