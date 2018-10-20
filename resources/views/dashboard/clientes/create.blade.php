<div id="create" class="modal fade">
    <div class="row modal-dialog">
        <div class="modal-content">
        <!-- Clientes -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="card-title">Crear cliente</div>
                </div>

                <div class="card-body">
                    <!-- Abrir el formulario de darle la ruta -->
                    {!! Form::open([null, 'method' => 'POST', 'v-on:submit.prevent' => 'crearCliente()']) !!}
                        <!-- Código -->
                        <div class="form-group">
                            {!! Form::label('codigo', 'Código') !!}
                            {!! Form::text('codigo', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Número de identificación', 'v-model' => 'cliente.codigo']) !!}
                        </div>
                        <!-- Nombres -->
                        <div class="form-group">
                            {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: Claudia Catalina', 'v-model' => 'cliente.nombres']) !!}
                        </div>
                        <!-- Apellidos -->
                        <div class="form-group">
                            {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: Castillo Castillo', 'v-model' => 'cliente.apellidos']) !!}
                        </div>
                        <!-- Telefono -->
                        <div class="form-group">
                            {!! Form::label('telefono', 'Teléfonos') !!}
                            {!! Form::text('telefono', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ejemplo: 3210000001,4123456', 'v-model' => 'cliente.telefono']) !!}
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: catalina@correo.com', 'v-model' => 'cliente.email']) !!}
                        </div>
                        <!-- Dirección -->
                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => 'Ejemplo: Cra. 10 # 20-30', 'v-model' => 'cliente.direccion']) !!}
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