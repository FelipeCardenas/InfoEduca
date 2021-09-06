
@extends('layout.master')

@section('contenido')

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-5">
                <div class="card-header bg-dark text-white">Login InfoEduca</div>
                <div class="card-body">
                    <h5 class="card-title">Inicio de Sesión</h5>
                <form method="POST" action="{{ route('usuarios.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Nombre usuario</label>
                            <input type="text" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection