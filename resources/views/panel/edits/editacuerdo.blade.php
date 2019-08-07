@extends('plantilla')

@section('contenido')
<div class="row my-5 justify-content-md-center">
<div class="col-md-7">
<h1 class="my-4 text-center text-info">Edicion de Acuerdo con clave: {{ $acuerdo->id }}</h1>   
@if (session('delacuerdo'))
    <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('delacuerdo') }}</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>  
@endif 
<form action="{{ route('updateacuerdo',$acuerdo) }}" method="POST" class="my-4">
        @method('PUT')
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
        <div class="form-group my-4">            
            <label for="nombreacuerdo">Nombre:</label>
            <input class="form-control" placeholder="Nombre"type="text" name="nombreacuerdo" value="{{ $acuerdo->nombre }}">
        </div>	
       
        <div class="form-group">
        <label for="fechaacuerdo">Fecha:</label>
            <input class="form-control"type="date" name="fechaacuerdo" value="{{ \Carbon\Carbon::parse($acuerdo->fecha)->format('Y-m-d') }}">
        </div>
        <div class="form-group">
        <label for="statusacuerdo">Status:</label>
        <select name="statusacuerdo" class="form-control">
                @switch($acuerdo->status)
                    @case('CERRADO')
                        <option value="CERRADO" selected>CERRADO</option>
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="FINALIZADO">FINALIZADO</option>
                        @break
                    @case('FINALIZADO')
                        <option value="CERRADO">CERRADO</option>
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="FINALIZADO" selected>FINALIZADO</option>
                        @break
                    @default
                        <option value="CERRADO">CERRADO</option>
                        <option value="PENDIENTE" selected>PENDIENTE</option>
                        <option value="FINALIZADO">FINALIZADO</option>
                @endswitch
        </select>
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