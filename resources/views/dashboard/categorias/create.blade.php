<div id="create" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Categorias -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Crear categoría</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open(['route' => 'categorias.store', 'method' => 'POST']) !!}
                        <!-- Nombre de la categoria -->
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre de la categoría') !!}
                            {!! Form::text('nombre', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Camisetas']) !!}
                        </div>
                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', true, ['class' => 'form-radio-input'])  !!}
                                <span class="form-radio-sign">Habilitar</span>
                            </label>
                        </div>
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