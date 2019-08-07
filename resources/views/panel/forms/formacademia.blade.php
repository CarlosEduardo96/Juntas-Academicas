@if (session('mensajeacademia'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>¡Datos Guardados Con exito!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif
<form action="{{ route('crearacademia') }}" method="POST" class="my-4">
    @csrf
    @error('nombreacademia')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Campo Nombre Requerido</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('carreraacademia')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Campo Carrera Requerido</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="form-group my-4">            
            <label>Academia:</label>
            <input class="form-control" placeholder="Nombre"type="text" name="nombreacademia">
            <label>Carrera:</label>
            <input class="form-control" placeholder="Carrera"type="text" name="carreraacademia">
    </div>	
    <div class="form-group">
        <input class="btn btn-success" id="add" type="submit" value="Guardar Cambios">
        <input class="btn btn-warning" type="reset" value="Limpiar">
    </div>
</form>