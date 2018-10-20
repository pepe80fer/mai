<div id="edit" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Obligaciones -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Editar obligación</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'PUT', 'v-on:submit.prevent' => 'actualizarObligacion()']) !!}
                        <!-- Nombre -->
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: Arriendo local', 'v-model' => 'obligacion.nombre']) !!}
                        </div>
                        <!-- Valor -->
                        <div class="form-group">
                            {!! Form::label('valor', 'Valor') !!}
                            {!! Form::number('valor', '1', ['class' => 'form-control', 'placeholder' => 'Ejemplo: 500000', 'v-model' => 'obligacion.valor']) !!}
                        </div>
                        <!-- Día repite -->
                        <div class="form-group">
                            {!! Form::label('dia_repite', 'Día repite') !!}
                            <select name="dia_repite" id="dia_repite" class="form-control" require="require" v-model="obligacion.dia_repite">
                                <option v-for="dia in diasMes" v-bind:value="dia">@{{ dia }}</option>
                            </select>
                        </div>
                        
                        @include('dashboard.template.errors2')
                        <!-- Boton editar -->
                        <div class="card-action">
                            <button class="btn btn-success pull-right">Actualizar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>