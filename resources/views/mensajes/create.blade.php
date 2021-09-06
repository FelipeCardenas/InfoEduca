@extends('layout.master')

@section('contenido')

Debido a la estructura de la pagina, este codigo sera funcional en la vista de cada evento.show,
 en el apartado de comentarios
<form method="POST" action="{{route('mensajes.store')}}" enctype="multipart/form-data">
    @csrf
      @csrf
<!--asunto a tratar -->
          <div class="row">

            <div class="col-md">

                <div class="col text-left"> 
                  <label for="asunto"><b>Asunto</b></label >
                  <input type="text" title="Asunto Usuario" name="asunto" id="asunto" 
                  class="form-control @error('Asunto') is-invalid @enderror" value="{{ old('asunto') }}" placeholder="Asunto">
                </div>

                <div class="col">
                  <label for="mail_contacto"><b>mail</b></label >
                  <input type="text" title="Mail_contacto " name="mail_contacto" id="mail_contacto" 
                  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email">
                </div>

            </div>
          </div>

<!--mensaje a entregar -->
          <div class="col-md">
            <label for=""><b>Mensaje:</b> </label>
            <textarea type="text" name="mensaje" id="mensaje" class="form-control textarea-content @error('mensaje') is-invalid @enderror" value="{{ old('mensaje') }}" rows="4" cols="80" placeholder="Mensaje"></textarea>
          </div>

          <div class = "mt -2">
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
          </div>
          <div class="col">
            <button type="submit" class="btn btn-info mt-2">Agregar Nuevo comentario</button>
          </div>
  </form>
@endsection