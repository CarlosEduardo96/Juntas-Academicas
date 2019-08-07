@if (session('crearlogin'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('crearlogin') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

<form action="{{ route('crearusuario') }}" method="POST" class="my-4">
    @csrf
    <h3 class="text-center text-info">Creacion de Usuarios Modo ADMIN</h3>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre" placeholder="Nombre de Usuario">
    </div>

    <div class="form-group">
        <label for="usuario">Usuario</label>
        <input class="form-control" type="email" name="usuario" placeholder="user@gmail.com">
    </div>
    <div class="form-group">
        <label for="contraseña1">Contraseña</label>
        <input class="form-control" type="password" name="contraseña" placeholder="Ingrese Contraseña">
        <label for="confirmar">Confirmar Contraseña</label>
        <input class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
    </div>
    
    
    <div class="form-group"> 
        <input class="btn btn-success" type="submit" value="¡Guardar!">
        <input class="btn btn-warning" type="reset" value="Limpiar">
    </div>
</form>