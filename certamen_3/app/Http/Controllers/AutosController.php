<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\TipoVehiculo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AutosRequest; 

class AutosController extends Controller
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
        $autos = Auto::all();
        $tiposvehiculos = TipoVehiculo::all();
        return view('autos.index', compact('autos','tiposvehiculos'));
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
    public function store(AutosRequest $request)
    {
        $auto = new Auto();
        $auto->patente = $request->patente;
        $auto->anio = $request->anio ;
        $auto->imagen = $request->imagen->store('public/autos');
        $auto->estado = 'd';
        $auto->tiposvehiculo_id = $request->tipovehiculo ;
        $auto->transmision = $request->transmision ;
        $auto->save();
        return redirect()->route('autos.index');
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
    public function update(Request $request, Auto $auto)
    {
        
        if(Auth::user()->rol==1){
            $auto->estado = $request->estado;
        }else{

            $auto->patente = $request->patente;
            $auto->anio = $request->anio;
            if($request->imagen != null){

                $auto->imagen = $request->imagen->store('public/autos');
            }

            $auto->transmision = $request->transmision;
            $auto->estado = $request->estado;
        }
        $auto->touch();
        $auto->save();
        return redirect()->route('autos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->estado = 'b';
        $auto->save();
        return redirect()->route('autos.index');
    }
}
