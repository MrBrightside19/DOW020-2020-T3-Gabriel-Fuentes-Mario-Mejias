<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoVehiculo;

class TiposVehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $tiposvehiculos = new TipoVehiculo();
        $tiposvehiculos->marca = $request->marca;
        $tiposvehiculos->modelo = $request->modelo;
        $tiposvehiculos->combustible = $request->combustible;
        $tiposvehiculos->motor = $request->motor;
        $tiposvehiculos->clase = $request->clase;
        $tiposvehiculos->precio = $request->precio;
        $tiposvehiculos->puertas = $request->puertas;
        $tiposvehiculos->save();
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
    public function update(Request $request, TipoVehiculo $tipo)
    {
        $tipo->marca = $request->marca;
        $tipo->modelo = $request->modelo;
        $tipo->combustible = $request->combustible;
        $tipo->motor = $request->motor;
        $tipo->clase = $request->clase;
        $tipo->puertas = $request->puertas;
        $tipo->precio = $request->precio;
        $tipo->touch();
        $tipo->save();
        return redirect()->route('autos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoVehiculo $tipo)
    {

        $tipo->delete();
        return redirect()->route('autos.index');
    }
}
