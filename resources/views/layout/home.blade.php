@extends('layout.master')

@section('contenido')

<!-- Evento principal proximo-->
<div class="row">
    <div class="col-md ">
        <div class="card md-5">
        <a href="{{ route('eventos.show',$evento_dest->id) }}">
            @if(isset($prox_evento->imagen))
                <img class="card-img-top" src="{{Storage::url($prox_evento->imagen)}}" alt="Proximo Evento" style="width:100%">
           @endif
           </a>
            <div class="card-body">
                <h4 class="card-title">{{ $prox_evento->nombre }}</h4>
                <p class="card-text text-right"> {{$prox_evento->fecha}} </p>
                
            </div>
        </div>
    </div>
<!-- Elementos destacados-->
    <div class="col-md">
        <div class="row no-gutters ">
            <div class="col-md-6">
                <a href="{{ route('eventos.show',$evento_dest->id) }}">
                @if($evento_dest->imagen)
                    <img class="card-img-top" src="{{ Storage::url($evento_dest->imagen) }}" alt="Proximo Evento" style="width:100%">
                @endif
                </a>
            </div>
            <div class="col-md-6">
                <div class="card-md">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $evento_dest->nombre }}</h4>
                        <p class="card-text text-right"> {{$evento_dest->fecha}} </p>
                        <a href="{{ route('eventos.show',$evento_dest->id) }}" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Otro -->
        <div class="row mw-100 ">
            <div class="col-md-6">
                <a href="{{route('eventos.show',$curso_dest->id)}}">
                @if($curso_dest->imagen)
                    <img class="card-img-top" src="{{ Storage::url($curso_dest->imagen) }}" alt="Proximo Evento" style="width:100%">
                @endif
                </a>
            </div>
            <div class="col-md-6">
                <div class="card-md">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $curso_dest->nombre }}</h4>
                        <p class="card-text text-right"> {{$curso_dest->fecha}} </p>
                        <a href="inscripcion/{$curso_dest->id}" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Otro-->
        <div class="row">
        <div class="col-md-6">
                <a href="{{route('eventos.show',$dest_pasado->id)}}">
                    <img class="card-img-top" src="{{ Storage::url($dest_pasado->imagen) }}" alt="Evento Destacado Pasado" style="width:100%">
                </a>
            </div>
            <div class="col-md-6">
                <div class="card-md">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $dest_pasado->nombre }}</h4>
                        <p class="card-text text-right"> {{$dest_pasado->fecha}} </p>
                        <a href="inscripcion/{$dest_pasado->id}" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>






        
    </div>
</div>





<!-- ----------------------------------- -->

@endsection