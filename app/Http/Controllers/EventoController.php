<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Otros;
use App\Usuario;
use App\Mensaje;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventoRequest;
class EventoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $eventos = Evento::where('tipo',1)->get();
        //dd($eventos);
        return view('eventos.index',compact('eventos'));
    }

    public function indexCurso()
    {
        $eventos = Evento::where('tipo',0)->get();
        //dd($eventos);
        $cursos = "Curso";
        return view('eventos.index',compact('eventos','cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $usuarios = Usuario::all();
        return view('eventos.create',compact('usuarios'));
    }

    /* ISCRIPCION DE PERSONAS EN EL EVENTO */
    public function inscripcion()
    {
        return view('eventos.inscripcion');
    }

    public function inscripcionStore(Request $request)
    {
        //dd($request->id);
        $evento = new Evento();
        $evento = Evento::find($request->id);     
          
        $evento->usuarios()->attach($request->rut);
        $eventos = Evento::all();
        if($evento->tipo == 1)
        {

            return back()->with('eventos');
        }else{
            return back()->with('eventos');
        }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = new Evento;
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo_evento;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->fecha = $request->fecha;
        $evento->imagen = $request->imagen->store('public/images/eventos');
        $evento->save();
        //dd($evento);

        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $usuarios = Usuario::all();
        $evento->visitas = ($evento->visitas) +1;
        $evento->save();

        //$registro = Evento::find($evento->id);
        //dd($mensajes);
        //dd($evento->usuarios());
        return view('eventos.show',compact('evento','usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo_evento;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->fecha = $request->fecha;
        if(!is_null($request->imagen))
        {
            $evento->imagen = $request->imagen->store('public/images/eventos');
        }
        //dd($evento);
        $evento->save();

        return redirect()->route('eventos.index',$evento->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $evento = Evento::where('id',$id)->get();
        dd($evento);
        $evento->usuarios()->detach();
        $evento = null;
        */
        Evento::destroy($id);
        //return redirect()->route('eventos.index);
        return back()->with('info','El evento ha sido eliminado');
    }
}
