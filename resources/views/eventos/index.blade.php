@extends('layout.master')

@section('contenido')
<div class="row mt-2">
  <div class="col">
    @if (isset($cursos))
      <h2> Cursos </h2>
    @else
      <h2>Eventos</h2>
    @endif
  </div>

  <div class="col text-right">
    <a class="btn btn-primary pull-left mt-2" name="agregar" href="{{route('eventos.create')}}">Agregar</a>
  </div>
</div>

<!-- Prueba y error -->

  @foreach($eventos->chunk(4) as $chunk)
  
  <div class="row crearfix">
    @foreach($chunk as $evento)
    <div class="card-deck">
    <div class="card " style="width: 15rem;">
      @if(isset($evento->imagen))
        <a href="{{ route('eventos.show',$evento->id) }}">
          <img class="card-img-top rounded mx-auto row" src="{{Storage::url($evento->imagen)}}" alt="Evento" style="width: 29'px ;">
        </a>
      @endif
      
      <div class="card-body text-center">
        <div class="row">
            <h5 class="card-title">{{ $evento->nombre }}</h5>
            <h6 class="card-text">{{$evento->fecha}}</h6> 
        </div>
      </div>

      <div class="card-footer">
        <div class="row">
          <div class="col-md">
            <a href="{{route('actividad.edit',$evento->id)}}" class="btn btn-info col text-center" ><i class='far fa-edit'></i></a>           
          </div>
          <div class="col-md">
            <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger col "><i class='far fa-trash-alt'></i> </button>
            </form>    
          </div>
        </div>
      </div>

    </div>
    </div>
    @endforeach
  </div>
@endforeach







@endsection