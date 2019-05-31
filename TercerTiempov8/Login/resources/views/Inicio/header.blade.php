<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <!-- Menu -->
                <nav class="navbar navbar-static-top" role="navigation">
                <div  class="container">
                <div class="row">
 					<div class="col-lg-2">              
                    <div class="navbar-header">
                       <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                       </button>
                       <img src="/img/firma.png" class="logo"/>
                    </div>
                    </div>
                    <div class="col-lg-102">
                    <div class="navbar-collapse collapse" id="navbar">
               			<ul class="nav navbar-nav">
                            <li><a href="{{ URL::to('/') }}" class="btn-menu">Dashboard</a></li>
                            @if( Auth::user()->superadmin == 1)
                            	<li><a href="{{ URL::to('/rutas/') }}" class="btn-menu"></i>Rutas</a></li>
                            	<li><a href="{{ URL::to('/clientes/') }}" class="btn-menu">Clientes</a></li>
                            @endif
                            @if( !(Auth::user()->parent_id) )
                            	<li><a href="{{ URL::to('/usuarios/') }}" class="btn-menu">Usuarios</a></li>
                            @endif
                            <li><a href="{{ URL::to('/recibidos') }}" class="btn-menu"> SMS Recibidos</a></li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle btn-menu"  data-toggle="dropdown">Envío SMS <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="{{ URL::to('/envioSMS') }}" style="border-bottom: transparent !important;">Crear Envío</a></li>
                                    <li><a href="{{ URL::to('/borradores') }}" style="border-bottom: transparent !important;">Borradores</a></li>
                                    <li><a href="{{ URL::to('/plantillas') }}" style="border-bottom: transparent !important;">Plantillas</a></li>
                                    <li><a href="{{ URL::to('/en-curso') }}" style="border-bottom: transparent !important;">En Curso</a></li>
                                    <li><a href="{{ URL::to('/finalizados') }}" style="border-bottom: transparent !important;">Envíos Finalizados</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle btn-menu" data-toggle="dropdown">Contactos <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <!--<li><a href="{{ URL::to('/contactos') }}" style="border-bottom: transparent !important;"> Administrar Contactos</a></li>-->
                                    <li><a href="{{ URL::to('/listas-importadas') }}"" style="border-bottom: transparent !important;">Listas importadas</a></li>
                                    <li><a href="{{ URL::to('/grupos') }}" style="border-bottom: transparent !important;">Administrar Grupos</a></li>
                                    <li><a href="{{ URL::to('/importar-contactos') }}" style="border-bottom: transparent !important;">Importar Contactos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle btn-menu" data-toggle="dropdown">Reportes <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="{{ URL::to('/reportes/general') }}" style="border-bottom: transparent !important;">Reporte General</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                    			<a class="dropdown-toggle count-info btn-menu" data-toggle="dropdown" href="#">{{ Auth::user()->name }} <i class="fa fa-cog fa-2x"></i> <b class="count-creditos">{!! $credits !!}</b></a>
                    		 		<ul class="dropdown-menu dropdown-alerts  animated fadeInDown">
                        				<li><a href="#" class="cant-creditos" style="border-bottom: transparent !important; padding-left: 7px;">Créditos disponibles: <b>{!! $credits !!}</b></a></li>
                        				<li class="divider"></li>
                        				<li><div class="link-block"><a href="#" style="border-bottom: transparent !important;">Ver mi perfil <i class="fa fa-angle-right"></i></a></div></li>
                       					<li class="divider"></li> 
                						<li><div class="link-block"><a href="{{ url('/logout') }}" style="border-bottom: transparent !important;">Cerrar sesión <i class="fa fa-angle-right"></i></a></div></li> 
                    				</ul>
                   			</li>
                   		  </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                </nav>
            </div>
