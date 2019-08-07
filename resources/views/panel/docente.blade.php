<h1 class="text-center border-bottom border-primary">Docentes</h1>
<nav>
<ul class="nav nav-tabs" id="mydocenteTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="insertdocente-tab" data-toggle="tab" href="#insertdocente" role="tab" aria-controls="insertdocente" aria-selected="true">Agregar y Actualizar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="listdocente-tab" data-toggle="tab" href="#listdocente" role="tab" aria-controls="listdocente" aria-selected="false">Consultar y Agragar</a>
  </li>
</ul>
</nav>

<div class="tab-content" id="myjefesTabContent">
  <!--Comienso del tab insert-->
  <div class="tab-pane fade show active" id="insertdocente" role="tabpanel" aria-labelledby="insertdocente-tab">
    @include('panel.forms.formdocente')
  </div>
  <div class="tab-pane fade" id="listdocente" role="tabpanel" aria-labelledby="listdocente-tab">
      @if (session('deldocente'))
      <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('deldocente') }}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>  
      @endif
    <form>
      <div class="my-3 form-inline my-4">
          <p>Buscar:  <input class="form-control" placeholder="Introdusca el Nombre" type="text"> <input class="btn btn-info" type="submit" value="Buscar">
          </p>
      </div>
    </form>
  
    <!--Inicio de la lista-->
    <div class="table-responsive table-hover">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
            <th scope="col">Sexo</th>
            <th scope="col-4">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Area</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="listajefe">
            @foreach ($docente as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>      
                <td>{{ $item->nombre }} </td>     
                <td>{{ $item->ap_paterno }} {{ $item->materno }}</td> 
                <td>{{ $item->edad }} </td>  
                <td>{{ $item->sexo }} </td>   
                <td> {{ $item->telefono }}</td>  
                <td>{{ $item->correo }} </td>  
                <td>{{ $item->puesto }} </td>  
                <td>{{ $item->area }} </td>  
                <td>
                <a href="{{ route('editardocente',$item) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('eliminardocente',$item) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Eliminar">
                </form>
                </td>
              </tr>           
            @endforeach
        </tbody>
      </table>
    </div>
    <!--fin de la lista-->
  </div>
</div>