<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Tercer Tiempo</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
      <li class="nav-item">
        <a class="nav-link"href="{{route('entrar')}}">Login</a>
      </li>
     
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Registrar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item"href="{{route('registrar')}}">Registro usuario natural</a>
          <a class="dropdown-item"href="#">Registro como empresa</a>
        </div>
      </li>
    </ul>
   
    </div>
</nav>
  


