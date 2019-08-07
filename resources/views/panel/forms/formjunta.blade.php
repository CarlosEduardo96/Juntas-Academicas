@if (session('mensajejunta'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('mensajejunta') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

@if (session('errorjunta'))
<div class="my-4 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('errorjunta') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

<form class="was-validated my-4" method="POST" action="{{ route('crearjunta') }}">
    @csrf
    <div class="form-row">
        <div class="form-goup col">
            <label for="fechajunta">Fecha:</label>
            <input type="date" name="fechajunta" class="form-control" required>            
        </div>
        <div class="form-goup col">
            <label for="horajunta">Hora:</label>
            <input type="time" name="horajunta" class="form-control" required>
        </div>
    </div>
    <div class="form-row my-4">
        <div class="form-group col">
            <label for="nombrejunta">Nombre: </label>
            <input type="text" name="nombrejunta" placeholder="Nombre de la Junta" class="form-control" required>
        </div>
        <div class="form-group col">
            <label for="academiajunta">Academia</label>
            <select name="academiajunta" class="form-control">
                @foreach ($academia as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre." | ".$item->carrera }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="descripcionjunta">Descripcion:</label>
            <textarea class="form-control" name="descripcionjunta" rows="4" placeholder="Escriba una breve descripcion de la junta." required></textarea>        
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="nombreorden">Nombre:</label>
            <input type="text" name="nombreorden" id="nombreorden" placeholder="Nombre de la orden" class="form-control">
            <br><input type="button" id="addorden"value="Agregar" class="btn btn-success">
        </div>
    </div>
    <div class="form-row">            
        <input type="submit" value="¡Guardar!" class="btn btn-success col">          
        <div class="col-1"></div>
        <input type="reset" value="Limpiar" class="btn btn-warning col">
    </div>
    <h2 class="border-bottom border-primary my-5 text-center text-info">Lista de Acuerdo y Orden Atratar</h2>
    <div class="row my-5">        
        <div class="col">
            <div class="table-responsive-xl table-hover">
                <table class="table" id="listaorden">
                    <thead>
                    <tr>                        
                        <th scope="col"><input type="button" onclick="eliminarFila()" value="Eliminar Ultima orden registrada" class="btn btn-info"></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col">           
           <div class="table-responsive-xl table-hover">
            <table class="table">
                <thead>
                <tr>                    
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($acuerdos as $item)
                        @if ($item->status=="PENDIENTE")
                            <tr>
                                <td>{{  $item->nombre }}</td>
                                <td>{{  $item->fecha }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
             </table>
            </div>
        </div>
    </div>    
</form>