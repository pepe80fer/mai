@extends ('dashboard.template.main')

@section('title','Categorías')

@section('errorMessage','Error categoría')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de categorías
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva categoría
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php ( $i=1 )
                    @foreach($categorias AS $k => $value)
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
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarCategoria({{ $value }})">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="{{ Route('categorias.destroy', $value->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Está seguro de borrar la categoría grupo?')">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.categorias.create')
        @include('dashboard.categorias.edit')
        <!-- <pre>@{{ $data }}</pre> -->
    </div>
@endsection