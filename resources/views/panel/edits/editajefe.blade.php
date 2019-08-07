@extends('plantilla')

@section('contenido')
<div class="row my-5 justify-content-md-center">
    <div class="col-md-7">

        @if (session('mensajejefe'))
            <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('mensajejefe') }}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>  
        @endif 

        <h1 class="my-4 text-center text-info">Edicion de Jefe con clave: {{ $jefe->id }}</h1> 
        <form class="my-4 was-validated" method="POST" action="{{ route('updatejefe', $jefe) }}">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="nombrejefe">Nombre:</label>
                <input class="form-control" type="text" name="nombrejefe" placeholder="Nombre" value="{{ $jefe->nombre }}" required>
                </div>
                <div class="form-group col">
                    <label for="paternojefe">Paterno:</label>
                    <input class="form-control" type="text" name="paternojefe" value="{{ $jefe->ap_paterno }}" placeholder="Apellido" required>
                </div>
                <div class="form-group col">
                    <label for="nmaternojefe">Materno:</label>
                    <input class="form-control" type="text" name="maternojefe" value="{{ $jefe->ap_materno }}" placeholder="Apellido" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="edadjefe">Edad:</label>
                    <input class="form-control" type="number" name="edadjefe" value="{{ $jefe->edad }}" placeholder="Edad" required>
                </div>
                <div class="form-group col">
                    <label for="sexojefe">Sexo:</label>
                    <select name="sexojefe" class="form-control">
                        @switch($jefe->sexo)
                            @case('MASCULINO')
                                <option value="FEMENINO">FEMENINO</option>
                                <option value="MASCULINO" selected>MASCULINO</option>
                                <option value="OTROS">OTROS</option>
                                
                                @break
                            @case('FEMENINO')
                                <option value="FEMENINO">FEMENINO</option>
                                <option value="MASCULINO" selected>MASCULINO</option>
                                <option value="OTROS">OTROS</option>
                                @break
                            @default
                                <option value="FEMENINO">FEMENINO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="OTROS" selected>OTROS</option>
                                @break
                        @endswitch
                    </select>
                </div>
                <div class="form-group col">
                    <label for="areajefe">Area:</label>
                    <input type="text" name="areajefe" placeholder="Area" value="{{ $jefe->area }}" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="telefonojefe">Telefono:</label>
                    <input class="form-control" type="tel" name="telefonojefe" value="{{ $jefe->telefono }}" pattern="([0-9]{2}-)?[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="01-000-000-00-00" required>
                </div>
                <div class="form-group col">
                    <label for="correojefe">Correo:</label>
                    <input class="form-control" type="email" name="correojefe" value="{{ $jefe->correo }}" placeholder="user@gmail.com" required>
                </div>        
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="¡Guardar Cambios!">
                <input class="btn btn-warning" type="reset" value="Limpiar">
                <a href="{{ route('panel') }}" class="btn btn-danger">Regresar al Panel</a>
            </div>
        </form>
    </div>
</div>    
@endsection