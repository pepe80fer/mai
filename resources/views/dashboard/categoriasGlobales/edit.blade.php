<div id="edit" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Categorias globales -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Editar categoría global</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'PUT', 'v-on:submit.prevent' => 'actualizarCategoriaGlobal( categoriaGlobal.id )']) !!}
                        <!-- Nombre de la categoria -->
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre de la categoría global') !!}
                            {!! Form::text('nombre', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ropa para hombre', 'v-model' => 'categoriaGlobal.nombre']) !!}
                        </div>
                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', null, ['class' => 'form-radio-input', 'v-model' => 'categoriaGlobal.estado'])  !!}
                                <span class="form-radio-sign">Habilitar</span>
                            </label>
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '0', null, ['class' => 'form-radio-input', 'v-model' => 'categoriaGlobal.estado'])  !!}
                                <span class="form-radio-sign">Deshabilitar</span>
                            </label>
                        </div>
                        <!-- errores -->
                        <div id="errors" class="form-control">
                            <ul>
                                <li class="text-danger">@{{ errors.message }}</li>
                                <li v-for="error in errors.errors" class="text-danger">@{{ error }}</li>
                            </ul>
                        </div>
                        <!-- Enviar o Cancelar -->
                        <div class="card-action">
                            <button class="btn btn-success pull-right">Actualizar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>