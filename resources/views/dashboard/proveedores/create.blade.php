<div id="create" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Proveedores -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Crear proveedor</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'POST', 'v-on:submit.prevent' => 'crearProveedor()']) !!}
                        <!-- Código -->
                        <div class="form-group">
                            {!! Form::label('codigo', 'Código') !!}
                            {!! Form::text('codigo', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Número de identificación', 'v-model' => 'proveedor.codigo']) !!}
                        </div>
                        <!-- Nombre -->
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: K-Boom', 'v-model' => 'proveedor.nombre']) !!}
                        </div>
                        <!-- Contacto -->
                        <div class="form-group">
                            {!! Form::label('contacto', 'persona de contacto') !!}
                            {!! Form::text('contacto', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: Andrés Lopez', 'v-model' => 'proveedor.contacto']) !!}
                        </div>
                        <!-- Telefono -->
                        <div class="form-group">
                            {!! Form::label('telefono', 'Teléfonos') !!}
                            {!! Form::text('telefono', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: 3210000001,4123456', 'v-model' => 'proveedor.telefono']) !!}
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: kboom@correo.com', 'v-model' => 'proveedor.email']) !!}
                        </div>
                        <!-- Dirección -->
                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: Cra. 10 # 20-30', 'v-model' => 'proveedor.direccion']) !!}
                        </div>
                        <!-- Estado por defecto 1 -->
                        <div class="form-check">
                            <label class="form-radio-label">
                                {!! Form::radio('estado', '1', true, ['class' => 'form-radio-input', 'v-model' => 'proveedor.estado'])  !!}
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