@extends ('dashboard.template.main')

@section('title','Categorías globales')

@section('errorMessage','Error categoría global')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de categorías gobales
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva categoría global
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php ( $i=1 )
                    @foreach($categoriasGlobales AS $k => $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $value->nombre }}</td>
                        <td>
                            @if( $value->estado )
                            <span class="badge badge-success">Habilitado</span>
                            @else
                            <span class="badge badge-danger">Deshabilitado</span>
                            @endif
                        <td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarCategoriaGlobal({{ $value }})">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="{{ Route('categoriasglobales.destroy', $value->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Está seguro de borrar la categoría general?')">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.categoriasGlobales.create')
        @include('dashboard.categoriasGlobales.edit')
        <!-- <pre>@{{ $data }}</pre> -->
    </div>
@endsection