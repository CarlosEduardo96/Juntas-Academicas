<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-crearuser" role="tab" aria-controls="nav-home" aria-selected="true">Crear Usuario</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-listuser" role="tab" aria-controls="nav-profile" aria-selected="false">Lista de Usuarios</a>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-crearuser" role="tabpanel" aria-labelledby="nav-crearuser-tab">
        @include('panel.forms.formlogin')
    </div>

    <div class="tab-pane fade" id="nav-listuser" role="tabpanel" aria-labelledby="nav-listuser-tab">
        <form>
            <div class="my-3 form-inline my-4">
                <p>Buscar:  <input class="form-control" placeholder="Introdusca el Nombre" type="text" id="bnombreacademia"> 
                <input class="btn btn-info" id="buscaracademia"  type="submit" value="Buscar">
                </p>
            </div>
        </form>
        <!--Inicio lista-->
        <div class="table-responsive-xl table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody id="listaacademia">
                @foreach ($users as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>                   
                    <td>
                    {{ $item->usuario }}
                    </td>
                    <td>
                        {{ $item->tipo }}
                    </td>
                    <td class="row">
                        <div class="col">                  
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </div>
                    </td>
                <tr>   
                @endforeach
                </tbody>
            </table>
            
            </div>
            <!--Fin de la tabla-->
    </div>
</div>