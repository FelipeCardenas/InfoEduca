@extends('layout.master')

@section('contenido')
 
<div class="col mt-3">
  <h3 class="mt-2 mb-2"> Usuarios registrados</h3>
</div> 
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
<div class="row mt-1">
  


  <div class="col-md-7 ">
  
  
    <form method="POST" action="{{route('usuarios.store')}}">
    @csrf
    <div class="row mt-2">
    <div class="col-md-2 text-right"> <label for="nombre">Nombre:</label >  </div>
      <div class="col-md-3"> <input type="text" title="Nombre Usuario" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"  > </div>
      <div class="col-md-2 text-right"> <label for="nombre">Rut:</label >  </div>
      <div class="col-md-3"> <input type="text" title="id" name="usuario_id" id="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror "value="{{ old('usuario_id') }}"> </div>
      <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
    </form>




  </div>
  <div class="col-md-3">
  </div> 
</div>


<div class="row mt-2">
  <div class="col-md">
    <div class="table-responsive">
      <table class=" table table-striped table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th >#</th>
                <th >Nombre</th>
                <th >id</th>
                <th> Acción</th>
            </tr>
        </thead>
        <tbody>
          @foreach($usuarios as $usuario )
            <tr>
                <td > {{$loop->iteration}}</td>
                <td ><a href="{{ route('usuarios.show',$usuario->id) }}">{{ucwords($usuario->nombre)}}</a></td>
                <td> {{ $usuario->id }} </td>
                <td >

                <div class="col">
                <div class="row">
                    <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-success col-md-6 mr-2 text-center" ><i class='far fa-edit'></i></a> 
                    <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger col-md"><i class='far fa-trash-alt'></i> </button>
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