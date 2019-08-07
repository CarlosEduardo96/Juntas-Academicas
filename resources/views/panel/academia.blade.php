<h1 class="text-center border-bottom border-primary ">Academias</h1>
<nav>
<ul class="nav nav-tabs" id="myacademiaTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="insert-tab" data-toggle="tab" href="#insert" role="tab" aria-controls="insert" aria-selected="true">Agregar y Actualizar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="false">Consultar y Agragar</a>
  </li>
</ul>
</nav>

<div class="tab-content" id="myacademiaTabContent">
  <!--Comienso del tab insert-->
  <div class="tab-pane fade show active" id="insert" role="tabpanel" aria-labelledby="insert-tab">
    @include('panel.forms.formacademia')
  </div>
  <!--Fin del tab insert-->
  <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
    <form>
    <div class="my-3 form-inline my-4">
        <p>Buscar:  <input class="form-control" placeholder="Introdusca el Nombre" type="text"> 
        <input class="btn btn-info" type="submit" value="Buscar">
        </p>
    </div>
    </form>
    
    <!--Inicio de la tabla-->
    @if (session('delacademia'))
    <div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('delacademia') }}</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>  
    @endif
    <div class="table-responsive-xl table-hover">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre de la Academia</th>
            <th scope="col">Carrera</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="listaacademia">
          @foreach ($academia as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>                   
            <td>
              {{ $item->nombre }}
            </td>
            <td>
                {{ $item->carrera }}
            </td>
            <td>              
            <a href="{{ route('editaracademia',$item) }}" class="btn btn-warning">Editar</a>        
            <form action="{{ route('eliminaracademia',$item) }}" method="POST" class="d-inline">   
              @method('DELETE')
              @csrf   
              <input type="submit" value="Eliminar" class="btn btn-danger">
            </form>
            </td>
          <tr>   
          @endforeach
        </tbody>
      </table>
      
    </div>
    <!--Fin de la tabla-->
  </div>
</div>