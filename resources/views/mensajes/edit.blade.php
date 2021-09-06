@extends('layout.master')

@section('contenido')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{route('mensajes.update',$mensaje->id)}}">
            @csrf
            @method('PUT')
            <div class="col">
                <div class="col">
                    <div class="row form-group">
                        <h4> <b>Asunto: </b></h4>
                        <input type="text" class="form-control" value="{{ $mensaje->asunto }}" id="asunto" name="asunto">
                    </div>

                </div>
       
                <!-- group form -->
                <div class="col">
                    <div class="row form-group">
                        <h4> <b>email: </b></h4>
                        <input type="text" class="form-control" value="{{ $mensaje->mail_contacto }}" id="mail_contacto" name="mail_contacto">
                    </div>
                </div>
                
                <!-- group form -->
                <div class="row form-group">
                    <div class="col">
                        <label for=""><b>Mensaje:</b> </label>
                        <textarea type="text" name="mensaje" id="mensaje" class="form-control textarea-content" rows="4" cols="80">{{$mensaje->mensaje}}</textarea>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row ml-1">
                <button type="submit" class="btn btn-primary">Editar mensaje</button>
            </div>
    </form>
</div>
@endsection