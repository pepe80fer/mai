@extends ('dashboard.template.main')

@section('title','Tallas')

@section('errorMessage','Error tallas')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de tallas
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva talla
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(talla, index) in listaTallas">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ talla.talla }}</td>
                        <td>
                            <span v-if="talla.estado == 1" class="badge badge-success">Habilitado</span>
                            <span v-else class="badge badge-danger">Deshabilitado</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarTalla( talla )">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarTalla( talla )">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @include('dashboard.tallas.create')
        @include('dashboard.tallas.edit')
        <!-- <pre>@{{ $data }}</pre> -->
    </div>
@endsection