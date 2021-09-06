<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Evento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;

class UsuarioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //dd('quizas pueda ser algo despues');
        $usuarios = Usuario::orderby('nombre')->get();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::all();
        return view('usuarios.create',compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = new Usuario;

        $existe = Usuario::find($request->usuario_id);

        if ($existe == null)
        {
            $usuario->nombre = $request->nombre;
            $usuario->id = $request->usuario_id;
            $usuario->save();
        }
        else
        {
            return redirect(route('usuarios.index'));
        }
        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //dd($usuario);
        return view('usuarios.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //dd($usuario);
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->nombre = $request->nombre;
        $usuario->save();
        return redirect()->route('usuarios.index',$usuario->rut);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($rut)
    {
        Usuario::destroy($rut);
        return back()->with('info','El usuario ha sido eliminado');
    }
}
