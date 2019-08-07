@extends('plantilla')
@section('contenido')
<div class="row my-5 justify-content-md-center">
    <div class="col-md-7">
    @if (session('actualizar'))
    <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('actualizar') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>  
    @endif

    <h1 class="my-4 text-center text-info">Edicion de Docente con clave: {{ $docente->id }}</h1> 
    <form class="was-validated" action="{{ route('updatedocente',$docente) }}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-row">
                <div class="form-goup col">
                    <label for="ceduladocente">Cedula:</label>
                    <input class="form-control" type="text" name="ceduladocente" placeholder="Cedula" value="{{ $docente->cedula }}" required>
                </div>
                <div class="form-goup col">
                    <label for="nombredocente">Nombre:</label>
                    <input class="form-control" type="text" name="nombredocente" placeholder="Nombre" value="{{ $docente->nombre }}" required>
                </div>
                <div class="form-goup col">
                    <label for="paternodocente">Paterno:</label>
                    <input class="form-control" type="text" name="paternodocente" placeholder="Apellido" value="{{ $docente->ap_paterno }}" required>
                </div>
                <div class="form-goup col">
                    <label for="maternodocente">Materno:</label>
                    <input class="form-control" type="text" name="maternodocente" placeholder="Apellido" value="{{ $docente->ap_materno }}" required>
                </div>        
            </div>
        
            <div class="form-row my-3">
                <div class="form-group col">
                    <label for="edaddocente">Edad:</label>
                    <input class="form-control" type="number" name="edaddocente" placeholder="Edad" value="{{ $docente->edad }}" required>
                </div>
                <div class="form-group col">
                    <label for="sexodocente">Sexo:</label>
                    <select name="sexodocente" class="form-control">
                        @switch($docente->sexo)
                            @case('FEMENINO')
                                <option value="FEMENINO" selected>FEMENINO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="OTROS">OTROS</option>
                                @break
                            @case('MASCULINO')
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
                    <label for="areadocente">Area:</label>
                    <input class="form-control" type="text" name="areadocente" placeholder="Area" value="{{ $docente->area }}" required>
                </div>        
                <div class="form-group col">
                    <label for="puestodocente">Puesto:</label>
                    <select name="puestodocente" class="form-control">
                        @switch($docente->puesto)
                            @case('PRESIDENTE')
                                <option value="PRESIDENTE">PRESIDENTE(a)</option>
                                <option value="SECRETARIO">SECRETARIO(a)</option>
                                <option value="VOCAL">VOCAL</option>
                                @break
                            @case('SECRETARIO')
                                <option value="PRESIDENTE">PRESIDENTE(a)</option>
                                <option value="SECRETARIO" selected>SECRETARIO(a)</option>
                                <option value="VOCAL">VOCAL</option>
                                @break
                            @default
                                <option value="PRESIDENTE">PRESIDENTE(a)</option>
                                <option value="SECRETARIO">SECRETARIO(a)</option>
                                <option value="VOCAL" selected>VOCAL</option>
                            @break
                        @endswitch
                    </select>
                </div>
            </div>   
        
            <div class="form-row">
                <div class="form-group col">
                    <label for="academiadocente">Academia:</label>
                    <select name="academiadocente" class="form-control" required>
                        @foreach ($academia as $item)
                            @if ($item->id==$docente->idAcademia)
                                <option value="{{ $item->id }}" selected> {{ $item->id }} | {{ $item->nombre }} | {{ $item->carrera }}</option>
                            @else
                                <option value="{{ $item->id }}"> {{ $item->id }} | {{ $item->nombre }} | {{ $item->carrera }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="jefedocente">Jefedecrrera:</label>
                    <select name="jefedocente" class="form-control" required>
                            @foreach ($jefe as $item)
                            @if ($item->id==$docente->idJefe)
                                <option value="{{$item->id }}" selected>{{$item->id }} | {{$item->nombre." ".$item->ap_paterno." ".$item->ap_materno }} | {{$item->area }}</option>
                            @else
                            <option value="{{$item->id }}">{{$item->id }} | {{$item->nombre." ".$item->ap_paterno." ".$item->ap_materno }} | {{$item->area }}</option>
                            @endif
                                
                            @endforeach
                    </select>
                </div>
        
            </div>
        
            <div class="form-row">
                <div class="form-group col">
                    <label for="telefonodocente">Telefono:</label>
                    <input class="form-control" type="tel" name="telefonodocente" value="{{ $docente->telefono }}" pattern="([0-9]{2}-)?[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="01-000-000-00-00" required>
                </div>
                <div class="form-group col">
                    <label for="correojefe">Correo:</label>
                    <input class="form-control" type="email" name="correodocente" value="{{ $docente->correo }}" placeholder="user@gmail.com" required>
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