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
    <!-- Barra de navegacion -->
    @yield('barramenu')
    <!-- Barra de navegacion -->
    <!-- Cuerpo -->
    <div class="container my-4">
        @yield('contenido')
    </div>
    <!-- fin del cuerlpo -->
    <!-- Pie de pagina -->
    <footer class="py-5 bg-light">
        <div class="container">
            <p class="m-0 text-center text-dark">Copyright &copy;  ItscoCademias <?php echo date('Y');?>	v0.1 Beta</p>
        </div>        
    </footer>
    <!-- fin de pie de pagina -->
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>