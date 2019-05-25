<ul class="sidebar navbar-nav">
       
       

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-running"></i>
          <span>Configuración</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" id="a" href="{{route('editEvento', Crypt::encrypt($evento->id))}}">Editar</a>
          <a class="dropdown-item" href="register.html">voleyball</a>
         k
        </div>
      </li>
     <li class="nav-item">
        <a class="nav-link" id="activarRegistro" href="·">
          <i class="fas fa-users"></i>
          <span>Agregar equipo</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Estadísticas</span></a>
      </li>
       <li class="nav-item">f
        <a class="nav-link" href="{{route('Fechas', Crypt::encrypt($evento->id))}}">
         <i class="far fa-calendar-check"></i>
          <span>Fechas deportivas</span></a>
      </li>

     
     
    </ul>