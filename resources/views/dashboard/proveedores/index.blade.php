@extends ('dashboard.template.main')

@section('title','Proveedores')

@section('errorMessage','Error proveedores')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de proveedores
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nuevo proveedor
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(proveedor, index) in listaProveedores">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ proveedor.codigo }}</td>
                        <td>@{{ proveedor.nombre }}</td>
                        <td>@{{ proveedor.contacto }}</td>
                        <td>@{{ proveedor.telefono }}</td>
                        <td>@{{ proveedor.email }}</td>
                        <td>@{{ proveedor.direccion }}</td>
                        <td>
                            <span v-if="proveedor.estado == 1" class="badge badge-success">Habilitado</span>
                            <span v-else class="badge badge-danger">Deshabilitado</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarProveedor( proveedor )">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarProveedor( proveedor )">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @include('dashboard.proveedores.create')
        @include('dashboard.proveedores.edit')
        <!-- <pre>@{{ $data }}</pre> -->
    </div>
@endsection