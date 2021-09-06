@extends('layout.master')

@section('contenido')
<div class="card">
  <div class="card-body">

    <div class="row form-group text-center">
      <div class="col text-center form-group">
       <h1> <b> {{$evento->nombre}}</b> </h1>
      <br>
      <h4> {{ $evento->direccion }} - {{ $evento->ciudad }} </h4>
      <h6> {{ $evento->fecha }}</h6>
      </div>
    </div>
    <div class="row mx-auto ">
      <div class="col">

        <!-- Aqui agrego a la persona con el evento a la tabla de interseccion -->
        <form method="POST" action="{{route('inscripcion.store')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="id" name="id" value="{{$evento->id}}">
          <div class="form-group">
            <label for="">Inscribir</label>
            <select name="rut" id="rut" class="form-control">
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->nombre}}</option>
                @endforeach
            </select>
          </div>

          <div class="col form-group">
                <div class="row">
                <label for="cant_entradas">Cantidad Entradas:</label>
                  <select class="form-control w-25 ml-2" id="cant_entradas" name="cant_entradas  ">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option calue="4">4</option>
                  </select> 
                </div>
          </div>
          <div class="">
            <button type="submit" class="btn btn-primary">Inscribir</button>
          </div>
        </form>
        <!-- Aqui termina el form -->
      </div>
      <div class="col-md-8 mt-2">
        <div class="card border-0">
              @if(isset($evento->imagen))
              <img class="card-img-top  rounded mx-auto md" src="{{Storage::url($evento->imagen)}}" alt="Evento" style="width: 400 md;">
            @endif
              <div class="card-body">
                <div class="col-md text-center"> <h5> {{ $evento->descripcion }} </h5> </div>
                  
              </div>
          </div>
      </div>
    
      
    </div>


<!-- Collapse button -->

<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#inscritos">Usuarios Inscritos</button>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#comentarios">Comentarios</button>
  </div>
  
  
</div>


<div id="inscritos" class="collapse mt-2 row">
<div class="col">
    <div class="table-responsive">
      <table class=" table table-striped table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th >#</th>
                <th >Nombre</th>
            </tr>
        </thead>
        <tbody>
          @foreach($evento->usuarios as $usuario )
            <tr>
                <td > {{$loop->iteration}}</td>
                <td ><a href="{{ route('usuarios.show',$usuario->id) }}">{{ucwords($usuario->nombre)}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>


  </div>
</div> 

<div id="comentarios" class="collapse mt-2 row">
  <div class="col">
    @foreach($evento->mensajes as $mensaje)
    <div class="card">
      <div class="card-header border border-0">
        <h4>{{$mensaje->usuario->nombre}} </h4>
          {{$mensaje->created_at}}
        <br>
        {{$mensaje->asunto}}</div>
        <div class="card-body ml-5">{{$mensaje->mensaje}}</div>

    </div>

    @endforeach
  
  <form method="POST" action="{{route('mensajes.store')}}" enctype="multipart/form-data">
    @csrf
<!--asunto a tratar -->
    <input type="hidden" name="evento_id" id="evento_id" class="form-control" value="{{$evento->id}}">
    
    <!-- Email Contacto -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for=""> <b> Usuario </b> </label>
          <select name="usuario_id" id="usuario_id" class="form-control">
              @foreach ($usuarios as $usuario)
                  <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->nombre}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="mail_contacto"><b>Email de Contacto</b></label >
          <input type="text" title="Mail_contacto " name="mail_contacto" id="mail_contacto" class="form-control" placeholder="email">
        </div>
        
      </div>
    </div>
    
    <!-- Mensaje -->
    <div class="form-group">
      <textarea type="text" name="mensaje" id="mensaje" class="form-control textarea-content" rows="4" cols="80" placeholder="Mensaje"></textarea>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-info mt-2">Publicar</button>
    </div>


          
  </form>
</div>
</div>

@endsection