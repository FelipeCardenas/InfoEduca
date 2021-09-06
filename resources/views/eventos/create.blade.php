
@extends('layout.master')

@section('contenido')
<div class="col-12">
<div class="card ml">
  <div class="card-body ">
  <form method="POST" action="{{route('eventos.store')}}" enctype="multipart/form-data">
          @csrf



        <!--Grupo aqui-->
        <div class="row form-group ml-2"> 
          <h4> <b>Nombre Actividad: </b></h4>
          <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" id="nombre" name="nombre">
        </div>

        <!--Grupo aqui-->
        <div class="row form-group">
            <div class="col-md ml-2">
                <label><b>Dirección:</b> </label>
                <input type="text" class="form-control ml @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" id="direccion" name="direccion">
            </div>
            <div class="col-md ">
              <label><b>Ciudad:</b> </label>
              <input type="text" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" id="ciudad" name="ciudad">
            </div>
        </div>  

        <!--Grupo aqui-->
        <div class="row form-group ml-2">
          <div class="col-md-6">
              <div class="row form-group">
                  <label><b>Fecha del Evento:</b> </label>
                  <input type="date" title="Fecha" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('ciudad') }}">
              </div>
              <div class="row form-group">
                  <div class="custom-file">
                      <input type="file" id="imagen" name="imagen" class="custom-file-input">
                      <label for="imagen" class="custom-file-label" data-browse="Examinar">Seleccionar imagen</label> 
                  </div>
              </div>
              <div class="row form-group">
                  <label for="tipo_evento">Tipo de Actividad:</label>
                  <select class="form-control" id="tipo_evento" name="tipo_evento">
                    <option id="1" value="1">Evento</option>
                    <option id="0" value="0">Curso</option>
                  </select>
      
        
              </div>
          </div>

          <div class="col-md">
                <label for="descripcion">Descripción:</label>
                <textarea type="text" title="Descripción breve de Evento" name="descripcion" id="descripcion" 
                class="form-control textarea-content @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}"rows="4" cols="80"></textarea>
              </div>
        </div>
          
        <!--Grupo aqui-->
        @if ($errors->any())
          <div class="alert alert-danger">
          <p>Ha ocurrido un problema</p>  
          <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    

        <hr>
        <div class="row ml-1">
          <button type="submit" class="btn btn-primary">Agregar Evento</button>
        </div>

</form>

</div>

@endsection

@section('scripts')
  <script>
    $('#imagen').on('change',function(){
      var archivo = $(this).val().replace('C:\\fakepath\\',"");
      $(this).next('.custom-file-label').html(archivo);
    });
  </script>
@endsection