@extends('plantilla')

@section('contenido')
<div class="row my-5 justify-content-md-center">
<div class="col-md-7">
<h1 class="my-4 text-center text-info">Edicion de Academias con clave: {{ $academia->id }}</h1>   
@if (session('delacademia'))
    <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('delacademia') }}</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>  
@endif 
<form action="{{ route('updateacademia',$academia) }}" method="POST" class="my-4">
        @method('PUT')
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
        <input class="form-control" placeholder="Nombre"type="text" name="nombreacademia" value="{{ $academia->nombre }}">
                <label>Carrera:</label>
        <input class="form-control" placeholder="Carrera"type="text" name="carreraacademia" value="{{ $academia->carrera }}">
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