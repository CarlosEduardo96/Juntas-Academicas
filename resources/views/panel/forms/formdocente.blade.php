@if (session('mensajedocente'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ session('mensajedocente') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>  
@endif


@if (session('contradocente'))
<div class="my-4 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('contradocente') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>  
@endif

<form action="{{ route('creardocente') }}" class="my-4 was-validated" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-goup col">
            <label for="ceduladocente">Cedula:</label>
            <input class="form-control" type="text" name="ceduladocente" placeholder="Cedula" required>
        </div>
        <div class="form-goup col">
            <label for="nombredocente">Nombre:</label>
            <input class="form-control" type="text" name="nombredocente" placeholder="Nombre" required>
        </div>
        <div class="form-goup col">
            <label for="paternodocente">Paterno:</label>
            <input class="form-control" type="text" name="paternodocente" placeholder="Apellido" required>
        </div>
        <div class="form-goup col">
            <label for="maternodocente">Materno:</label>
            <input class="form-control" type="text" name="maternodocente" placeholder="Apellido" required>
        </div>        
    </div>

    <div class="form-row my-3">
        <div class="form-group col">
            <label for="edaddocente">Edad:</label>
            <input class="form-control" type="number" name="edaddocente" placeholder="Edad" required>
        </div>
        <div class="form-group col">
            <label for="sexodocente">Sexo:</label>
            <select name="sexodocente" class="form-control">
                <option value="FEMENINO">FEMENINO</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="OTROS" selected>OTROS</option>
            </select>
        </div>
        <div class="form-group col">
            <label for="areadocente">Area:</label>
            <input class="form-control" type="text" name="areadocente" placeholder="Area" required>
        </div>        
        <div class="form-group col">
            <label for="puestodocente">Puesto:</label>
            <select name="puestodocente" class="form-control">
                <option value="PRESIDENTE">PRESIDENTE(a)</option>
                <option value="SECRETARIO">SECRETARIO(a)</option>
                <option value="VOCAL" selected>VOCAL</option>
            </select>
        </div>
    </div>   

    <div class="form-row">
        <div class="form-group col">
            <label for="academiadocente">Academia:</label>
            <select name="academiadocente" class="form-control" required>
                @foreach ($academia as $item)
                    <option value="{{ $item->id }}"> {{ $item->id }} | {{ $item->nombre }} | {{ $item->carrera }}</option>                    
                @endforeach                
            </select>
        </div>
        <div class="form-group col">
            <label for="jefedocente">Jefedecrrera:</label>
            <select name="jefedocente" class="form-control" required>
                @foreach ($jefe as $item)
            <option value="{{ $item->id }}"> {{ $item->id }} | {{ $item->nombre." ".$item->ap_paterno." ".$item->ap_materno}} | {{ $item->area }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="telefonodocente">Telefono:</label>
            <input class="form-control" type="tel" name="telefonodocente" pattern="([0-9]{2}-)?[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="01-000-000-00-00" required>
        </div>
        <div class="form-group col">
            <label for="correojefe">Correo:</label>
            <input class="form-control" type="email" name="correodocente" placeholder="user@gmail.com" required>
        </div>        
    </div>
    
    <h3 class="text-center text-info">Contraseña por defecto:</h3>
    <div class="form-row my-3">
        <div class="form-group col">
            <label for="contraseñadocente">Contraseña:</label>
            <input class="form-control" type="password" name="contraseñadocente" placeholder="Contraseña" required>
        </div>
        <div class="form-group col">
            <label for="confirmardocente">Veririficar Contraseña:</label>
            <input class="form-control" type="password" name="confirmardocente" placeholder="Confirmar" required>
        </div>
    </div>
    <div class="form-group my-4">
        <input type="submit" value="¡Guardar!" class="btn btn-success">
        <input type="reset" value="Limpiar" class="btn btn-warning">
    </div>
</form>