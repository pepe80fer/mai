<div id="create" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Referencias -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Crear referencia</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'POST', 'v-on:submit.prevent' => 'crearReferencia()']) !!}
                        
                        <!-- Categoría global -->
                        <div class="form-group">
                            {!! Form::label('categoria_global_id', 'Categoría global') !!}
                            <select name="categoria_global_id" id="categoria_global_id" class="form-control" required="required" v-model="referencia.categoria_global_id">
                                <option value="" selected>Seleccione</option>
                                <option v-for="catGlobal in listaCategoriasGlobales" v-bind:value="catGlobal.id">@{{ catGlobal.nombre }}</option>
                            </select>
                        </div>

                        <!-- Categoría -->
                        <div class="form-group">
                            {!! Form::label('categoria_id', 'Categoría') !!}
                            <select name="categoria_id" id="categoria_id" class="form-control" required="required" v-model="referencia.categoria_id">
                                <option value="" selected>Seleccione</option>
                                <option v-for="categoria in listaCategorias" v-bind:value="categoria.id">@{{ categoria.nombre }}</option>
                            </select>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '', ['class' => 'form-control', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Ejemplo: Cómics', 'v-model' => 'referencia.nombre']) !!}
                        </div>

                        <!-- Código -->
                        <div class="form-group">
                            {!! Form::label('codigo', 'Código') !!}
                            {!! Form::text('codigo', '', ['class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Ejemplo: Ref001', 'v-model' => 'referencia.codigo']) !!}
                        </div>

                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', true, ['class' => 'form-radio-input'])  !!}
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