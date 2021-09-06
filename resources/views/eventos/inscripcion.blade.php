@extends('layout.master')

@section('contenido')
<div class="card">
  <div class="card-body">
  <form method="POST" action="{{route('inscripcion.store')}}">
  @csrf
        <div class="col-md form-group">
          <h4> <b> Nombre Evento </b></h4>
        </div>
        
        <br>
    <div class="row form-group">
      <div class="col-md">
        <span><b>Nombre:</b> </span>
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
      <div class="col-md">
        <span><b>Rut:</b> </span>
        <input type="number" class="form-control" id="rut" name="rut">
      </div>
    </div>

    <div class="row form-group">
        <div class="col">
            <label for="cant_entradas">Cantidad de Entradas:</label>
            <select class="form-control" id="cant_entradas" name="cant_entradas">
                <option id="1" value="1">1</option>
                <option id="2" value="2">2</option>
                <option id="3" value="3">3</option>
                <option id="4" value="4">4</option>
            </select>

      </div>
      
    </div>
  <hr>
<div class="row">

    <button type="submit" class="btn btn-primary">Inscribirme</button>

</div>
</form>
@endsection 