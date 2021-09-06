@extends('layout.master')

@section('contenido')
<form method="POST" action="{{route('usuarios.update',$usuario->rut)}}">
    @csrf
    @method('PUT')
    <div class="row form-group mt-2">
        <div class="col">
            <div class="row form-group">
                <label for="nombre ">Nombre:</label > 
            </div>
            <div class="row form-group">
                <input type="text" title="Nombre Usuario" name="nombre" id="nombre" class="form-control" value="{{$usuario->nombre}}">
            </div>
        </div>
        <div class="col">
            <div class="row form-group">
                <label for="nombre">Rut:</label >  
            </div>
            <div class="row">
                <input type="text" title="Rut" name="rut" id="rut" class="form-control " value="{{$usuario->rut}}"> 
            </div>
            
        </div>    
    </div>
        <div class="row">
        <button type="submit" class="btn btn-success col-6 text-center"><i></i>Editar</button>

        <a href="{{route('usuarios.index',$usuario->rut)}}" class="btn btn-primary col-6">Volver</a>  </div>
    </div>

</form>


@endsection