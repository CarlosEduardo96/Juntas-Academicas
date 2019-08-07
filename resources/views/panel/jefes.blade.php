<h1 class="text-center border-bottom border-primary">Jefe de Carrera</h1>
<nav>
<ul class="nav nav-tabs" id="myjefesTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="insertjefe-tab" data-toggle="tab" href="#insertjefe" role="tab" aria-controls="insertjefe" aria-selected="true">Agregar y Actualizar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="listjefe-tab" data-toggle="tab" href="#listjefe" role="tab" aria-controls="listjefe" aria-selected="false">Consultar y Agragar</a>
  </li>
</ul>
</nav>

<div class="tab-content" id="myjefesTabContent">
  <!--Comienso del tab insert-->
  <div class="tab-pane fade show active" id="insertjefe" role="tabpanel" aria-labelledby="insertjefe-tab">
    @include('panel.forms.formjefe')
  </div>
  <div class="tab-pane fade" id="listjefe" role="tabpanel" aria-labelledby="listjefe-tab">
      @if (session('deljefe'))
      <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('deljefe') }}</strong> 
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
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Area</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="listajefe">
            @foreach ($jefe as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>   
                  <td>{{ $item->nombre }}</td>
                  <td>{{ $item->ap_paterno }}  {{ $item->ap_materno }}</td>
                  <td>{{ $item->edad }}</td>
                  <td>{{ $item->sexo }}</td>
                  <td>{{ $item->telefono }}</td>
                  <td>{{ $item->correo }}</td>
                  <td>{{ $item->area }}</td>   
                  <td>
                    <div class="row">
                        <div class="col d-inline">
                            <a href="{{ route('editarjefe',$item) }}" class="btn btn-warning">Iditar</a>
                        </div>
                        <div class="col d-inline">
                        <form action="{{ route('eliminarjefe',$item) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger d-inline" type="submit" value="Eliminar">     
                          </form> 
                        </div>       
                    </div>                             
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!--fin de la lista-->
  </div>
</div>