<h1 class="text-center border-bottom border-primary ">Juntas Academicas</h1>
<ul class="nav nav-tabs" id="myjuntasTab" role="tablist">

<li class="nav-item">
    <a class="nav-link active" id="ordendia-tab" data-toggle="tab" href="#ordendia" role="tab" aria-controls="ordendia" aria-selected="true">
    Crear Junta</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="temajunta-tab" data-toggle="tab" href="#temajunta" role="tab" aria-controls="temajunta" aria-selected="false">
    Temas a tratar</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="listjuntas-tab" data-toggle="tab" href="#listjuntas" role="tab" aria-controls="listjuntas" aria-selected="false">
    Juntas</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="listordenes-tab" data-toggle="tab" href="#listordenes" role="tab" aria-controls="listordenes" aria-selected="false">
    Ordenes</a>
  </li>
  
</ul>

<div class="tab-content" id="myjuntasContent">
  <!--Comienso del tab insert-->
  <div class="tab-pane fade show active" id="ordendia" role="tabpanel" aria-labelledby="ordendia-tab">
    
    @include('panel.forms.formjunta')
  </div>  
  <div class="tab-pane fade show" id="temajunta" role="tabpanel" aria-labelledby="temajunta-tab">
    <h1>Temas</h1>
  </div> 

  <div class="tab-pane fade" id="listjuntas" role="tabpanel" aria-labelledby="listjuntas-tab">
    <form>
      <div class="my-4 form-row">  
        <div class="form-group col-10">  
          <input class="form-control" type="text" id="bnombrejunta" placeholder="Buscar por Nombre" required>
        </div>        

        <div class="form-group col">        
          <input class="form-control btn btn-info" type="button" id="buscarjunta" value="Buscar">
        </div>         
      </div>
    </form>
    <!--Inicio de la lista-->
    <div class="table-responsive-xl table-hover">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>            
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>                                 
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($junta as $item)
            <tr>
              <th>{{ $item->id }}</th>
              <td>{{ $item->nombre }}</td>
              <td>{{ $item->fecha }}</td>
              <td>{{ $item->hora }}</td>
              <td>
                <form>
                  <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!--fin de la lista-->      
  </div>

  <div class="tab-pane fade show" id="listordenes" role="tabpanel" aria-labelledby="listordenes-tab">
  <form>
      <div class="my-4 form-row">  
        <div class="form-group col-10">  
          <input class="form-control" type="text" id="bnombreorden" placeholder="Buscar por Nombre" required>
        </div>        

        <div class="form-group col">        
          <input class="form-control btn btn-info" type="button" id="buscarorden" value="Buscar">
        </div>         
      </div>
  </form>
    <!--Inicio de la lista-->
    <div class="table-responsive-xl table-hover">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>            
            <th scope="col">Fecha</th>                                 
          </tr>
        </thead>
        <tbody>
            @foreach ($orden as $item)
              <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->fecha }}</td>         
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!--fin de la lista-->      
  </div>
  
</div>