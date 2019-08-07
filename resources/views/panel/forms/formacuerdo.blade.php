@if (session('mensajeacuerdo'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>¡Datos Guardados Con exito!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif
<form class="my-4" action="{{ route('crearacuerdo') }}" method="POST">
    @csrf
    @error('nombreacuerdo')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Campo Nombre Requerido</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('fechaacuerdo')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Campo Fecha Requerido</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('statusacuerdo')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Campo Status Requerido</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="form-group">
        <label for="nombreacuerdo">Nombre:</label>
        <input class="form-control" type="text" name="nombreacuerdo" placeholder="Acuerdo a tratar">
    </div>
    <div class="form-group">
        <label for="fechaacuerdo">Fecha:</label>
        <input class="form-control" type="date" name="fechaacuerdo" value="{{ date('Y-m-d') }}">
    </div>
    
    <div class="form-group">
        <label for="statusacuerdo">Status:</label>
        <select name="statusacuerdo" class="form-control">
            <option value="CERRADO">CERRADO</option>
            <option value="PENDIENTE" selected>PENDIENTE</option>
            <option value="FINALIZADO">FINALIZADO</option>
        </select>
    </div>
    <input class="btn btn-success"type="submit" value="¡Guardar!">        
    <input class="btn btn-warning"type="reset" value="Limpiar">
</form>