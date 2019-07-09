<ul class="sidebar navbar-nav">
       
        <li class="nav-item">f
        <a class="nav-link" href="{{route('VerificarPerfilEvento', Crypt::encrypt($evento->id))}}">
        <i class="far fa-futbol"></i>
          <span>Equipos</span></a>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-running"></i>
          <span>Configuración</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" id="a" href="{{route('editEvento', Crypt::encrypt($evento->id))}}">Editar evento</a>
          <a class="dropdown-item" href="{{route('DeleteEvento', Crypt::encrypt($evento->id))}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >Eliminar evento</a>
         
        </div>
      </li>
     
<!-- si el evento es por fase de grupos se va a crear esta funcion de crear grupos-->
<?php $estado = array($evento) ?>
   
   {{--  @if($estado[0]->Modalidad_id == 2) 
   <li class="nav-item">
          <a class="nav-link" href="">
          <i class="fas fa-project-diagram"></i>
          <span>Crear Grupos</span></a>
      </li>
    
  
    @endif --}}

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