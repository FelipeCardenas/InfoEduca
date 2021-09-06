@extends('layout.master')

@section('contenido')

<p></p>
<div class="row mt-2">
      <div class="col">
              <div clas="cad-body">

                <div class="row-md">
                   <h3 class="card-title"> <b>Detalles del usuario</b></h3> 
                </div>   
              
              </div>

            <h4>
            <div class="row">
                  <div class="col-md-4"> <b>Nombre:</b> {{ $usuario->nombre }} </div>
                  <div class="col-md-4"> <b>Rut:</b>{{ $usuario->id }} </div>    
            </div> 
            </h4>
      </div>  
</div>

<p></p>
<div class="col">
<div class="row ">
    <a href="{{route('usuarios.index',$usuario->id)}}" class="btn btn-primary ">Volver</a>

    <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger ML col-md ml-2 text-center " >Eliminar</button>
      </form>
</div>
</div>






<!-- Lista de eventos registrado en cards-->

@foreach($usuario->eventos->chunk(4) as $chunk)
  
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
            <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger col ">Desinscribir <i class='far fa-trash-alt'></i> </button>
            </form>    
          </div>
        </div>
      </div>

    </div>
    </div>
    @endforeach
  </div>
@endforeach

<!-- Mensajes enviados a cada evento -->
<h3> Mensajes </h3>

<div class="row mt-2">
  <div class="col">
    <div class="table-responsive">
      <table class=" table table-striped table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th >Asunto</th>
                <th>Mail de Contacto</th>
                <th>Mensaje</th>
                <th>Evento</th>
            </tr>
        </thead>
        <tbody>
          @foreach($usuario->mensajes as $mensaje )
            <tr>
                <td >{{$mensaje->asunto}}</td>
                <td>{{$mensaje->mail_contacto}}</td>
                <td>{{$mensaje->mensaje}}</td>
                <td>{{$mensaje->evento->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>


  </div>
  
</div>
@endsection