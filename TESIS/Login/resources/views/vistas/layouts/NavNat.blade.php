
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><span><img src="
       {{asset('/Componentes/assets/images/tercer.png')}}" alt="" width="30"></span></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">inicio</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('entrar')}}">Login</a>
      </li>
      <li class="nav-item active">
        
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Registrate
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="{{route('RegistroEmpresa')}}">Registrar como empresa</a>
          <a class="dropdown-item" href="{{route('registrar')}}">Registrar usuario natural</a>
        </div>
      </li>
    </ul>
  </div>
</nav>