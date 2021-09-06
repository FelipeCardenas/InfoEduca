<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Evento;
use App\Usuario;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMensajeRequest;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $mensajes = Mensaje::all();
        return view('mensajes.index',compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
      //  $usuarios = Usuario::orderby('nombre')->get();
      //  $eventos = Evento::orderby('nombre')->get();
        return view('mensajes.create');
        //return view('mensajes.create','eventos','usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMensajeRequest  $request)
    {
        //
        $mensaje = new Mensaje;
        //dd($mensaje);
        $mensaje->asunto = $request->asunto;
        $mensaje->mail_contacto = $request->mail_contacto;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->usuario_id = $request->usuario_id;
        //dd($mensaje);
        if(!is_null($request->evento_id))
        {
            $mensaje->evento_id = $request->evento_id;
            $evento = Evento::where('id',$request->evento_id)->get();
            //dd($evento);
            $mensaje->save();
            return back()->with('evento');
            //return redirect()->route('eventos.show',$request->evento_id,compact($evento));
            //return view('evento/show',$request->evento_id,compact($evento));
        }
        
        $mensaje->save();
        $mensajes = Mensaje::all();
        return back()->with('mensajes');
        //return redirect()->route('mensajes.index',$mensajes);
        

    }
    

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //
        return view('mensajes.show',compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        //
        return view('mensajes.edit',compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
        $mensaje->asunto = $request->asunto;
        $mensaje->mail_contacto = $request->mail_contacto;
        $mensaje->mensaje = $request->mensaje;
    //  $evento->evento_id = $request->evento_id;
    //    $usuario->rut = $request->rut;
        
        $mensaje->save();
        
        return redirect()->route('mensajes.index',$mensaje->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return redirect()->route('mensajes.index',$mensaje->id);
    }
}
