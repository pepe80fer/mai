@extends ('dashboard.template.main')

@section('title','Clientes')

@section('errorMessage','Error clientes')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de clientes
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nuevo cliente
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cliente, index) in listaClientes">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ cliente.codigo }}</td>
                        <td>@{{ cliente.nombres }}</td>
                        <td>@{{ cliente.apellidos }}</td>
                        <td>@{{ cliente.telefono }}</td>
                        <td>@{{ cliente.email }}</td>
                        <td>@{{ cliente.direccion }}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarCliente( cliente )">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarCliente( cliente )">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @include('dashboard.clientes.create')
        @include('dashboard.clientes.edit')
        <!-- <pre>@{{ $data }}</pre> -->
    </div>
@endsection