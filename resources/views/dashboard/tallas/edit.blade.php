<div id="edit" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Tallas -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Editar talla</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'PUT', 'v-on:submit.prevent' => 'actualizarTalla( talla.id )']) !!}
                        <!-- Texto de la talla -->
                        <div class="form-group">
                            {!! Form::label('talla', 'Talla') !!}
                            {!! Form::text('talla', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: S', 'v-model' => 'talla.talla']) !!}
                        </div>
                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', null, ['class' => 'form-radio-input', 'v-model' => 'talla.estado'])  !!}
                                <span class="form-radio-sign">Habilitar</span>
                            </label>
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '0', null, ['class' => 'form-radio-input', 'v-model' => 'talla.estado'])  !!}
                                <span class="form-radio-sign">Deshabilitar</span>
                            </label>
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