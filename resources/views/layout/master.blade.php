<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InfoEduca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body
    {
      background-color:#e3eaef;
    }
    navbar
    {
      background-color:#052740;
    }
  
  </style>    

</head>
<body>

      <nav class="navbar navbar-expand-sm fixed-top justify-content-center bg-dark navbar-dark">
          <a class="navbar-brand" href="/"><i class="fas fa-home"></i></a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('eventos.index')}}">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cursos.indexCurso')}}">Cursos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Contacto
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('usuarios.index')}}">Usuarios</a>
                <a class="dropdown-item" href="{{ route('mensajes.index')}}">Mensajes</a>
              </div>
            </li>
          </ul>
        </nav>
        <br>
    
    <br>
    <div class="container">
      @yield('contenido')
    </div>
<!-- Redes sociales-->
<div class="container-fluid">
  <div class="card">
    <div class="card-footer">
    <div class="row text-center">
        <div class="col">
          <a href="https://www.youtube.com/channel/UCQbFA3kVsB-_NyjiMP5evJg">
            <i class="fab fa-youtube" style="font-size:40px;color:#ff0000"></i></a> 
            <h6> Youtube </h6>
          
        </div>
        <div class="col">
          <a href="https://www.facebook.com/infoeduca.usm.cl">
            <i class=" fab fa-facebook" style="font-size:40px;color:#3b5998"></i> </a>
            <h6> Facebook </h6>
          
        </div>
        <div class="col">
          <a href="https://www.instagram.com/infoeducausm/?hl=es-la">
            <i class='fab fa-instagram' style='font-size:40px;color:#b2071d'></i>
          </a>
            <h6> Instagram </h6>
        </div>
        <div class="col">
          <a href="https://www.linkedin.com/in/infoeduca/">
            <i class='fa fa-linkedin-square' style='font-size:40px;color:#0077b5'></i>
          </a>
            
            <h6> LinkedIn </h6>
        </div>
    </div>
    </div>
  </div>

</div>

    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>