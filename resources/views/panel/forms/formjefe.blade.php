@if (session('mensajejefe'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('mensajejefe') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

@if (session('errorjefe'))
<div class="my-4 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('errorjefe') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

@if (session('contrajefe'))
<div class="my-4 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('contrajefe') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

<form class="my-4 was-validated" method="POST" action="{{ route('crearjefe') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col">
            <label for="nombrejefe">Nombre:</label>
            <input class="form-control" type="text" name="nombrejefe" placeholder="Nombre" required>
        </div>
        <div class="form-group col">
            <label for="paternojefe">Paterno:</label>
            <input class="form-control" type="text" name="paternojefe" placeholder="Apellido" required>
        </div>
        <div class="form-group col">
            <label for="nmaternojefe">Materno:</label>
            <input class="form-control" type="text" name="maternojefe" placeholder="Apellido" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="edadjefe">Edad:</label>
            <input class="form-control" type="number" name="edadjefe" placeholder="Edad" required>
        </div>
        <div class="form-group col">
            <label for="sexojefe">Sexo:</label>
            <select name="sexojefe" class="form-control">
                <option value="FEMENINO">FEMENINO</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="OTROS" selected>OTROS</option>
            </select>
        </div>
        <div class="form-group col">
            <label for="areajefe">Area:</label>
            <input type="text" name="areajefe" placeholder="Area" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="telefonojefe">Telefono:</label>
            <input class="form-control" type="tel" name="telefonojefe" pattern="([0-9]{2}-)?[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="01-000-000-00-00" required>
        </div>
        <div class="form-group col">
            <label for="correojefe">Correo:</label>
            <input class="form-control" type="email" name="correojefe" placeholder="user@gmail.com" required>
        </div>        
    </div>
    <h3 class="text-center text-info">Contraseña por defecto:</h3>
    <div class="form-row">
        <div class="form-group col">
            <label for="contraseñajefe">Contraseña:</label>
            <input class="form-control" type="password" name="contraseñajefe" placeholder="Contraseña" required>
        </div>
        <div class="form-group col">
            <label for="confirmarjefe">Virificar Contraseña:</label>
            <input class="form-control" type="password" name="confirmarjefe" placeholder="Confirmar" required>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="¡Guardar!" class="btn btn-success">
        <input type="reset" value="Limpiar" class="btn btn-warning">
    </div>
</form>