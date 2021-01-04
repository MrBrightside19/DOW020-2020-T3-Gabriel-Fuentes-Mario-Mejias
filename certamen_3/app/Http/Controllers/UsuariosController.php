<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuariosRequest;
use Gate;

class UsuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
        
        if(Gate::denies('listar-usuarios')){
            return redirect()->route('home.index');
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $usuarios = Usuario::all();
        return view('usuarios.index',compact('usuarios'));
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
    public function store(UsuariosRequest $request)
    {
    
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;
        $usuario->save();
        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        if(Auth::user()->id != $usuario->id){

            $usuario->rol = $request->rol;
        }
        $usuario->touch();
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    public function password(Request $request, Usuario $usuario){
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('usuarios.index');
    }

    public function login(Request $request)
    {

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'activo'=>true])){
            $usuario = Usuario::where('email', $request->email)->first();
            return redirect()->route('home.index');

        }else{
            return back()->withErrors('Usuario y/o contraseña inválidos');
        }
    
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }

    public function activar(Usuario $usuario){
        $usuario->activo = $usuario->activo?0:1;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }
}
