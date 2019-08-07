<h1 class="text-center border-bottom border-primary ">Acuerdos</h1>
<ul class="nav nav-tabs" id="myacuerdosTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="acuerdo-tab" data-toggle="tab" href="#acuerdo" role="tab" aria-controls="acuerdo" aria-selected="true">
    Acuerdos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="listacuerdo-tab" data-toggle="tab" href="#listacuerdo" role="tab" aria-controls="listacuerdo" aria-selected="false">
    Lista</a>
  </li>
</ul>

<div class="tab-content" id="myacuerdosContent">
  <!--Comienso del tab insert-->
  <div class="tab-pane fade show active" id="acuerdo" role="tabpanel" aria-labelledby="acuerdo-tab">
    @include('panel.forms.formacuerdo')
  </div>

  <div class="tab-pane fade" id="listacuerdo" role="tabpanel" aria-labelledby="listacuerdo-tab">
      @if (session('delacuerdo'))
      <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
        <strong> Academia Eliminada</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      @endif
    <form>
      <div class="my-4 form-row">  
        <div class="form-group col">       
          <input class="form-control" type="text" placeholder="Nombre" required>
        </div> 
        <div class="form-group col">        
          <select class="form-control"> 
            <option  value="CERRADO"> CERRADO </option>                   
            <option value="PENDIENTE"> PENDIENTE </option>
            <option value="FINALIZADO"> FINALIZADO </option> 
            <option value="ALL" selected> ALL </option>
          </select>
        </div>

        <div class="form-group col">        
          <input class="form-control btn btn-info" type="button" id="buscaracuerdo" value="Buscar">
        </div> 
        <div class="col"></div>
      </div>
    </form>
    <!--Inicio de la tabla-->
    <div class="table-responsive-xl table-hover">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha Inicial</th>
            <th scope="col">Fecha Final</th>
            <th scope="col">STATUS</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="listaacuerdos">
            @foreach ($acuerdos as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>   
                <td>{{ $item->nombre }}</td>
                <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                <td>{{ $item->status }}</td>
                <td class="row">
                    <div class="col">                
                    <a href="{{ route('editaracuerdo',$item) }}" class="btn btn-warning">Editar</a>               
                    </div>
                    <div class="col">                  
                    <form action="{{ route('eliminaracuerdo',$item) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                      </form>
                    </div>
                </td>
              </tr>
              @endforeach
        </tbody>
      </table>
    </div>
    <!--Fin de la tabla-->
  
  </div>
</div>