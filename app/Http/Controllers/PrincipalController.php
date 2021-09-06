<?php

namespace App\Http\Controllers;

use App\Otros;
use App\Evento;
use App\Usuario;

use Carbon;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1 Para eventos; 0 para cursos
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $prox_evento = Evento::where('fecha', '>=', $date)->first();
        //dd($prox_evento);
        //$destacados = Evento::where('fecha','>=',$date)->take(5)->get();
        //$destacado = $destacados[0];
        //dd($destacado);

        
        $curso_dest = Evento::where('tipo',0)->where('fecha','>=',$date)->first();
        //  dd($prox_evento);
        $dest_pasado = Evento::where('fecha','<=',$date)->orderBy('fecha','asc')->first();
        
        if(is_null($prox_evento))
        {
            $evento_dest = Evento::where('tipo',1)->where('fecha','>=',$date)->orderBy('visitas','desc')->first();
            $prox_evento = Evento::where('tipo',1)->orderBy('fecha','asc')->first();
            if(is_null($evento_dest))
            {
                $evento_dest = Evento::where('tipo',1)->orderBy('visitas','desc')->first();
                
            }
        }
        else{
            $evento_dest = Evento::where('tipo',1)->where('fecha','>=',$date)->where('id','!=',$prox_evento->id)->orderBy('visitas','desc')->first();
            if(is_null($evento_dest))
            {
                $evento_dest = Evento::where('tipo',1)->orderBy('visitas','desc')->first();
            }
        }
        if(is_null($curso_dest))
        {
            $curso_dest = Evento::where('tipo',0)->orderBy('visitas','desc')->first();
        }
        return view('layout.home',compact('prox_evento','curso_dest','evento_dest','dest_pasado'));
    }

    public function loginHome()
    {
        return view('login.login');
    }

    public function login()
    {
        
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
