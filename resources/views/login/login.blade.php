@extends('plantilla')

@section('contenido')

<h1 class="text-center text-info">Juntas de Academia</h1>   
<div class="row my-5 justify-content-md-center">
    <div class="col-md-7">
            @if (session('errorlogin'))
            <div class="my-4 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('errorlogin') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
            @endif
        <form action="{{ route('menu') }}" method="GET">            
            <h3 class="border-bottom border-primary">Login</h3>
            <h2 id="info"></h2>
            <div class="form-group">
                    <label>Usuario:</label>
                    <input class="form-control" placeholder="User@gmail.com" type="email" name="usuario" required>
                    <label>Contraseña:</label>
                    <input class="form-control" placeholder="Contraseña"type="password" name="contraseña" required>
            </div>	
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Iniciar Sesion">			
            </div>
        </form>
    </div>		
</div> 
@endsection