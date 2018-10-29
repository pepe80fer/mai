@extends ('dashboard.template.main')

@section('title','Referencias')

@section('errorMessage','Error Referencias')

@section('content')

    <div id="main" class="card">
        <referencias inline-template>
            <div>
                <div class="card-header">
                    <div class="card-title">
                        Listado de referencias
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                            Nueva referencia
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Código</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Categoría global</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $listaReferencias AS $i => $referencia )
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $referencia->nombre }}</td>
                                    <td>{{ $referencia->codigo }}</td>
                                    <td>{{ $referencia->categoriaRelacion->categoria->nombre }}</td>
                                    <td>{{ $referencia->categoriaRelacion->categoriaGlobal->nombre }}</td>
                                    <td>
                                        @if ( $referencia->estado == 1 )
                                            <span class="badge badge-success">Habilitado</span>
                                        @else
                                            <span class="badge badge-danger">Deshabilitado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarReferencia( {{ $referencia }} )">
                                            <i class="la la-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarReferencia( {{ $referencia->id }} )">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr v-for="(referencia, index) in listaReferencias">
                                <td>@{{ index + 1 }}</td>
                                <td>@{{ referencia.nombre }}</td>
                                <td>@{{ referencia.codigo }}</td>
                                <td></td>
                                <td>
                                    <span v-if="referencia.estado == 1" class="badge badge-success">Habilitado</span>
                                    <span v-else class="badge badge-danger">Deshabilitado</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarReferencia( referencia )">
                                        <i class="la la-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarReferencia( referencia )">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                @include('dashboard.referencias.create')
                @include('dashboard.referencias.edit')
            </div>
        </referencias>
    </div>
@endsection