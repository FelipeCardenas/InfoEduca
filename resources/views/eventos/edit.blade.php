@extends('layout.master')

@section('contenido')
<div class="card">
  <div class="card-body">
  <form method="POST" action="{{route('actividad.update',$evento->id)}}">
  @csrf
  @method('PUT')

  <div class="col">
         <!-- group form -->
        <div class="co-md form-group">
          <h4> <b>Nombre Evento: </b></h4>
          <input type="text" class="form-control" value="{{ $evento->nombre }}" id="nombre" name="nombre">
        </div>
        
        <br>
      <!-- group form -->
    <div class="row form-group">
      <div class="col-md">
        <span><b>Dirección:</b> </span>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$evento->direccion}}">
      </div>
      <div class="col-md">
        <span><b>Ciudad:</b> </span>
        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$evento->ciudad}}">
      </div>
    </div>
    
    <div class="row">
      <!-- group form -->
      <div class="row form-group col">
        <div class="col">
          <span><b>Fecha del Evento:</b> </span>
          <input type="date" title="Fecha" name="fecha" id="fecha" class="form-control">
          <!-- group form -->
          <div class="form-group">
                <label class="col-md-4 control-label"> <b>Imagen</b> </label>
                <img class="card-img-top" src="{{ Storage::url($evento->imagen) }}" alt="Imagen {{$evento->nombre}}" style="width:100%">
                <input type="file" class="form-control" name="file">
          </div>
      </div>
      <!-- group form -->
      <div class="row form-group col">
          <div class="col">
              <label for="descripcion">Descripción:</label>
              <textarea type="text" name="descripcion" id="descripcion" class="form-control textarea-content" rows="4" cols="80">{{$evento->descripcion}}</textarea>
          </div>
      </div>
    </div>
  </div>

  <!-- group form -->
  <div class="row form-group">
      <div class="col">
        <label for="tipo_evento">Tipo de Actividad:</label>
          <select class="form-control" id="tipo_evento" name="tipo_evento">
            <option id="1" value="1" @if($evento->tipo == 1 ) selected @endif>Evento</option>
            <option id="0" value="0" @if($evento->tipo == 0 ) selected @endif>Curso</option>
          </select>
      </div>

  </div>
  <hr>



<div class="row ml-1">
    <button type="submit" class="btn btn-primary">Editar Evento</button>
</div>
</form>
</div>
@endsection