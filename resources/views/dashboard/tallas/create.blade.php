<div id="create" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Tallas -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Crear talla</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'POST', 'v-on:submit.prevent' => 'crearTalla()']) !!}
                        <!-- Texto de la talla -->
                        <div class="form-group">
                            {!! Form::label('talla', 'Talla') !!}
                            {!! Form::text('talla', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: S', 'v-model' => 'talla.talla']) !!}
                        </div>
                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', true, ['class' => 'form-radio-input', 'v-model' => 'talla.estado'])  !!}
                                <span class="form-radio-sign">Habilitar</span>
                            </label>
                        </div>
                        @include('dashboard.template.errors2')
                        <!-- Enviar o Cancelar -->
                        <div class="card-action">
                            <button class="btn btn-success pull-right">Guardar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>