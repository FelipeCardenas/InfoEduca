@extends('layout.master')

@section('contenido')
<div class="row"> <div class="col-md text-center mt-2"><h3> Mensajes</h3> </div> </div>


<div class="col">
    <form method="POST" action="{{route('mensajes.store')}}" enctype="multipart/form-data">
      @csrf
        @csrf
 <!--asunto a tratar -->
            <div class="row">

              <div class="col-md">

                  <div class="col text-left"> 
                    <label for="asunto"><b>Asunto</b></label >
                    <input type="text" title="Asunto Usuario" name="asunto" id="asunto" 
                      class="form-control @error('asunto') is-invalid @enderror" value="{{ old('asunto') }}" placeholder="Asunto">
                  </div>

                  <div class="col">
                    <label for="mail_contacto"><b>mail</b></label >
                    <input type="text" title="Mail_contacto " name="mail_contacto" id="mail_contacto" 
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email">
                  </div>

              </div>
            </div>
<!--email del usuario --> 
            
 <!-- nombre del usuario   -->


<!-- evento al que asiste -->   


 <!--mensaje a entregar -->
            <div class="col-md">
              <label for=""><b>Mensaje:</b> </label>
              <textarea type="text" name="mensaje" id="mensaje" 
              class="form-control textarea-content @error('mensaje') is-invalid @enderror" value="{{ old('mensaje') }}" rows="4" cols="80" placeholder="Mensaje"></textarea>
            </div>


            <div>
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
</div>





<div class="col mt-2">
  <div class="col">
    <div class="table-responsive">
      <table class=" table table-striped table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Asunto</th> 
        <!--   <th>Evento</th> nombre del evento -->
        <!--   <th>Usuario</th> nombre del usuario -->
                <th>mail contacto</th>
                <th> Mensaje</th>
                <th> Acciones</th>
            </tr>
        </thead>


        <tbody>
          @foreach($mensajes as $mensaje)
            <tr> 
                <!-- ------Rellenado de tabla----------- -->
                <td > {{$loop->iteration}}</td>
                
                <td> <h6 >{{ucwords($mensaje->asunto)}} </h6>  </td>    <!-- Asunto -->

                <td> <h6>{{ucwords($mensaje->mail_contacto)}}  </td>    <!-- mail contacto -->
                
                <td>  <h6 >{{ucwords($mensaje->mensaje)}}   </td>    <!-- mensaje -->   
                <td >        <!-- Acciones -->
                  <div class="row">
                    <div class="col">
                      <a href="{{route('mensajes.edit',$mensaje->id)}}" class="btn btn-info col text-center" ><i class='far fa-edit'></i></a>  
                      <form method="POST" action="{{ route('mensajes.destroy', $mensaje->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger col"><i class='far fa-trash-alt'></i> </button>
                      </form>
                    </div>
                    
                    
                  </div> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  </div>
</div>
@endsection

