<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Juntas Academia</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Juntas de Academias</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">      
      <li class="nav-item">
        <a class="nav-link" href="#">Bienvenido Prueba</a>
	  </li>    
    <li class="nav-item">
    <a class="nav-link" href="{{ route('menu') }}">Menu </a>
    </li>
		<li class="nav-item active">
      <a class="nav-link" href="#">Panel de Control <span class="sr-only">(current)</span> </a>
		</li>
	  </li>   
      <li class="nav-item">
	  <a class="nav-link" href="Desconectar.php">Cerrar Sesion ( Prueba ) </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <!--Lista de opciones inicio -->
        <div class="col-lg-3">
          <h1 class="my-4 text-muted">Lista de Herramientas</h1>
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-academias-list" data-toggle="list" href="#list-academias" role="tab" aria-controls="academias">Academias</a>
            <a class="list-group-item list-group-item-action" id="list-jefe-list" data-toggle="list" href="#list-jefe" role="tab" aria-controls="jefe">Jefes de Carrera</a>
            <a class="list-group-item list-group-item-action" id="list-docentes-list" data-toggle="list" href="#list-docentes" role="tab" aria-controls="docentes">Docentes</a>
            <a class="list-group-item list-group-item-action" id="list-areaacuerdos-list" data-toggle="list" href="#list-areaacuerdos" role="tab" aria-controls="areaacuerdos">Acuerdos</a>
            <a class="list-group-item list-group-item-action" id="list-areajuntas-list" data-toggle="list" href="#list-areajuntas" role="tab" aria-controls="areajuntas">Juntas</a>
            <a class="list-group-item list-group-item-action" id="list-usuarios-list" data-toggle="list" href="#list-usuarios" role="tab" aria-controls="usuarios">Control de Usuarios</a>
          </div>

        </div>
        <!--Lista de opciones fin-->
        <!--Inicio de la vistas-->
        <div class="col-8 my-4">
          <div class="tab-content" id="nav-tabContent">
  
            <div class="tab-pane fade show active" id="list-academias" role="tabpanel" aria-labelledby="list-academias-list"> 
                @include('panel.academia')
            </div>
  
            <div class="tab-pane fade" id="list-jefe" role="tabpanel" aria-labelledby="list-jefe-list">
              @include('panel.jefes')
            </div>
            
            <div class="tab-pane fade" id="list-docentes" role="tabpanel" aria-labelledby="list-docentes-list">
                @include('panel.docente')
            </div>
  
            <div class="tab-pane fade" id="list-areaacuerdos" role="tabpanel" aria-labelledby="list-areaacuerdos-list">
                @include('panel.acuerdos')
            </div>
  
            <div class="tab-pane fade" id="list-areajuntas" role="tabpanel" aria-labelledby="list-areajuntas-list">
                @include('panel.juntas')
            </div>

            <div class="tab-pane fade" id="list-usuarios" role="tabpanel" aria-labelledby="list-usuarios-list">
                @include('panel.login')
            </div>

          </div>
        </div>
        <!--Fin de las vistas-->
    </div>
</div>

<footer class="py-5 bg-light">
    <div class="container">
        <p class="m-0 text-center text-dark">Copyright &copy;  ItscoCademias <?php echo date('Y'); ?>	v0.1 Beta</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/api.js') }}"></script>
</body>
</html>