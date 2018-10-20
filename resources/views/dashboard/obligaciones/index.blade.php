@extends ('dashboard.template.main')

@section('title','Obligaciones')

@section('errorMessage','Error obligaciones')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                Listado de obligaciones
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva obligación
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Día repite</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(obligacion, index) in listaObligaciones">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ obligacion.nombre }}</td>
                        <td class="text-right">@{{ obligacion.valor }}</td>
                        <td class="text-right">@{{ obligacion.dia_repite }}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click.prevent="editarObligacion( obligacion )">
                                <i class="la la-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" v-on:click.prevent="eliminarObligacion( obligacion )">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @include('dashboard.obligaciones.create')
        @include('dashboard.obligaciones.edit')
        <pre>@{{ $data }}</pre>
    </div>
@endsection