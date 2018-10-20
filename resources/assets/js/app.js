
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

toastr.options = {closeButton: true};

var app = new Vue({
    el: '#main',
    data: {
        // data : categorias
        categoriaGlobal: {
            id: null,
            nombre: '',
            estado: null
        },
        categoria: {
            id: null,
            nombre: '',
            estado: null,
            categoria_global_id: ''
        },
        listaCategoriasGlobales: [],

        // data : tallas
        talla: {
            id: 0,
            talla: '',
            estado: 1
        },
        listaTallas: [],

        // data : clientes
        cliente: {
            id: null,
            codigo: '',
            nombres: '',
            apellidos: '',
            telefono: '',
            email: '',
            direccion: ''
        },
        listaClientes: [],

        // data : proveedores
        proveedor: {
            id: null,
            codigo: '',
            nombre: '',
            contacto: '',
            telefono: '',
            email: '',
            direccion: '',
            estado: 1
        },
        listaProveedores: [],

        // data : obligaciones
        obligacion: {
            id: null,
            nombre: '',
            valor: null,    
            dia_repite: '30'
        },
        listaObligaciones: [],

        errors: []
    },
    mounted(){
        //Capturar el nombre del tag actual del menú
        var tag = $(" .nav-item.active ").attr('data-tag');
        switch( tag ) {
            case 'categoriasGenerales': this.getListaCategoriasGlobales(); break;
            case 'clientes':            this.getClientes(); break;
            case 'obligaciones':        this.getObligaciones(); break;
            case 'proveedores':         this.getProveedores(); break;
            case 'tallas':              this.getTallas(); break;
        }
    },
    methods: {
        limpiarErrores: function() {
            this.errors = [];
            $( ".errors-alert" ).hide();
        },
        // #################################################
        // ##########   METODOS PARA CATEGORIAS   ##########
        // #################################################
        getListaCategoriasGlobales: function(){
            axios.get('http://mai.com/data/getCategoriasGlobales').then(
                response => {
                    this.listaCategoriasGlobales = response.data;
                }, response => {
                    console.error('Error getListaCategoriasGlobales');
                }
            )
        },
        editarCategoriaGlobal: function(data) {
            //Cargar los valores
            this.categoriaGlobal.id = data.id;
            this.categoriaGlobal.nombre = data.nombre;
            this.categoriaGlobal.estado = data.estado;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarCategoriaGlobal: function(id) {
            var url = 'categoriasglobales/' + id;
            axios.put(url, this.categoriaGlobal).then(
                response => {
                    this.categoriaGlobal = {id: null, nombre: '', estado: null};
                    this.limpiarErrores();
                    $( "#edit" ).modal('hide');
                    location.reload();
                }, response => {
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },
        editarCategoria: function(data) {
            //Cargar los valores
            this.categoria.id = data.id;
            this.categoria.nombre = data.nombre;
            this.categoria.estado = data.estado;
            this.categoria.categoria_global_id = data.categoria_global_id;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarCategoria: function(id) {
            var url = 'categorias/' + id;
            axios.put(url, this.categoria).then(
                response => {
                    this.categoria = {id: null, nombre: '', estado: null, categoria_global_id: ''};
                    this.limpiarErrores();
                    $( "#edit" ).modal('hide');
                    location.reload();
                }, response => {
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },
        // #################################################
        // ##########     METODOS PARA TALLAS     ##########
        // #################################################
        getTallas: function() {
            var url = 'http://mai.com/data/getTallas';
            axios.get(url).then(
                response => {
                    this.listaTallas = response.data;
                }, response => {
                    console.error('Error getTallas');
                }
            );
        },
        limpiarTalla: function() {
            this.talla = {
                id: null,
                talla: '',
                estado: 1
            }
        },
        crearTalla: function() {
            var url = route('tallas.store').template;
            axios.post(url, this.talla).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente las tallas
                    this.getTallas();
                    $( "#create" ).modal('hide');
                    toastr.success('Talla ('+this.talla.talla+') creada correctamente');
                    this.limpiarTalla();
                }, response => {
                    this.errors = response.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al crear la talla");
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    console.log('errors',error);
                    this.errors = error.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al crear la talla");
                    $( ".errors-alert" ).show();
                });
        },
        editarTalla: function(data) {
            //Cargar los valores
            this.talla.id = data.id;
            this.talla.talla = data.talla;
            this.talla.estado = data.estado;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarTalla: function(id) {
            //var url = route('tallas.update',this.talla.id);
            var url = (route('tallas.update').template).replace('{talla}',this.talla.id);
            axios.put(url, this.talla).then(
                response => {
                    toastr["success"]('La talla ('+this.talla.talla+') se actualizó correctamente');
                    this.limpiarTalla();
                    this.limpiarErrores();
                    this.getTallas();
                    $( "#edit" ).modal('hide');
                }, response => {
                    this.errors = response.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar la talla");
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar la talla");
                    $( ".errors-alert" ).show();
                });
        },
        eliminarTalla: function(data) {
            var ban = confirm("¿Está seguro de eliminar la talla?");
            if( ban ) {
                var url = (route('tallas.destroy').template).replace('{talla}',data.id);
                axios.delete(url).then(
                    response => {
                        toastr["warning"]('La talla ('+data.talla+') se eliminó correctamente');
                        this.limpiarTalla();
                        this.limpiarErrores();
                        this.getTallas();
                    }, response => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar la talla");
                        this.errors = response.response.data;
                        $( ".errors-alert" ).show();
                    }).catch(error => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar la talla");
                        this.errors = error.response.data;
                        $( ".errors-alert" ).show();
                    });
            }
        },
        // #################################################
        // ##########    METODOS PARA CLIENTES    ##########
        // #################################################
        getClientes: function() {
            var url = route('clientes.data').template;
            axios.get(url).then(
                response => {
                    this.listaClientes = response.data;
                }, response => {
                    toastr["error"]("Revisa la lista de errores","No se pudo obtener los clientes");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }
            );
        },
        limpiarCliente: function() {
            this.cliente = {
                id: null,
                codigo: '',
                nombres: '',
                apellidos: '',
                telefono: '',
                email: '',
                direccion: ''
            }
        },
        crearCliente: function() {
            var url = route('clientes.store').template;
            axios.post(url, this.cliente).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente los clientes
                    this.getClientes();
                    $( "#create" ).modal('hide');
                    toastr.success('Cliente ('+this.cliente.nombres+') creado correctamente');
                    this.limpiarCliente();
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear el cliente");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear el cliente");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },
        editarCliente: function(data) {
            //Cargar los valores
            this.cliente.id = data.id;
            this.cliente.codigo = data.codigo;
            this.cliente.nombres = data.nombres;
            this.cliente.apellidos = data.apellidos;
            this.cliente.telefono = data.telefono;
            this.cliente.email = data.email;
            this.cliente.direccion = data.direccion;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarCliente: function(id) {
            var url = (route('clientes.update').template).replace('{cliente}',this.cliente.id);
            axios.put(url, this.cliente).then(
                response => {
                    toastr["success"]('El cliente ('+this.cliente.nombres+') se actualizó correctamente');
                    this.limpiarCliente();
                    this.limpiarErrores();
                    this.getClientes();
                    $( "#edit" ).modal('hide');
                }, response => {
                    this.errors = response.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar el cliente");
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar el cliente");
                    $( ".errors-alert" ).show();
                });
        },
        eliminarCliente: function(data) {
            var ban = confirm("¿Está seguro de eliminar el cliente?");
            if( ban ) {
                var url = (route('clientes.destroy').template).replace('{cliente}',data.id);
                axios.delete(url).then(
                    response => {
                        toastr["warning"]('El cliente ('+data.nombres+') se eliminó correctamente');
                        this.limpiarCliente();
                        this.limpiarErrores();
                        this.getClientes();
                    }, response => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar el cliente");
                        this.errors = response.response.data;
                        $( ".errors-alert" ).show();
                    }).catch(error => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar el cliente");
                        this.errors = error.response.data;
                        $( ".errors-alert" ).show();
                    });
            }
        },
        // #################################################
        // ##########   METODOS PARA PROVEEDORES  ##########
        // #################################################
        getProveedores: function() {
            var url = route('proveedores.data').template;
            axios.get(url).then(
                response => {
                    this.listaProveedores = response.data;
                }, response => {
                    toastr["error"]("Revisa la lista de errores","No se pudo obtener los proveedores");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }
            );
        },
        limpiarProveedor: function() {
            this.proveedor = {
                id: null,
                codigo: '',
                nombre: '',
                contacto: '',
                telefono: '',
                email: '',
                direccion: '',
                estado: 1
            }
        },
        crearProveedor: function() {
            var url = route('proveedores.store').template;
            axios.post(url, this.proveedor).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente los proveedores
                    this.getProveedores();
                    $( "#create" ).modal('hide');
                    toastr.success('Proveedor ('+this.proveedor.nombre+') creado correctamente');
                    this.limpiarProveedor();
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear el proveedor");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear el proveedor");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },
        editarProveedor: function(data) {
            //Cargar los valores
            this.proveedor.id = data.id;
            this.proveedor.codigo = data.codigo;
            this.proveedor.nombre = data.nombre;
            this.proveedor.contacto = data.contacto;
            this.proveedor.telefono = data.telefono;
            this.proveedor.email = data.email;
            this.proveedor.direccion = data.direccion;
            this.proveedor.estado = data.estado;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarProveedor: function() {
            var url = (route('proveedores.update').template).replace('{proveedore}',this.proveedor.id);
            axios.put(url, this.proveedor).then(
                response => {
                    toastr["success"]('El proveedor ('+this.proveedor.nombre+') se actualizó correctamente');
                    this.limpiarProveedor();
                    this.limpiarErrores();
                    this.getProveedores();
                    $( "#edit" ).modal('hide');
                }, response => {
                    this.errors = response.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar el proveedor");
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar el proveedor");
                    $( ".errors-alert" ).show();
                });
        },
        eliminarProveedor: function(data) {
            var ban = confirm("¿Está seguro de eliminar el proveedor?");
            if( ban ) {
                var url = (route('proveedores.destroy').template).replace('{proveedore}',data.id);
                axios.delete(url).then(
                    response => {
                        toastr["warning"]('El proveedor ('+data.nombre+') se eliminó correctamente');
                        this.limpiarProveedor();
                        this.limpiarErrores();
                        this.getProveedores();
                    }, response => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar el proveedor");
                        this.errors = response.response.data;
                        $( ".errors-alert" ).show();
                    }).catch(error => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar el proveedor");
                        this.errors = error.response;
                        $( ".errors-alert" ).show();
                    });
            }
        },
        // #################################################
        // ######### METODOS PARA LAS OBLIGACIONES #########
        // #################################################
        getObligaciones: function() {
            var url = route('obligaciones.data').template;
            axios.get(url).then(
                response => {
                    this.listaObligaciones = response.data;
                }, response => {
                    toastr["error"]("Revisa la lista de errores","No se pudo obtener las obligaciones");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }
            );
        },
        limpiarObligacion: function() {
            this.obligacion = {
                id: null,
                nombre: '',
                valor: null,
                dia_repite: '30'
            }
        },
        crearObligacion: function() {
            var url = route('obligaciones.store').template;
            axios.post(url, this.obligacion).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente las obligaciones
                    this.getObligaciones();
                    $( "#create" ).modal('hide');
                    toastr.success('Obligación ('+this.obligacion.nombre+') creada correctamente');
                    this.limpiarObligacion();
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la obligación");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la obligación");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },
        editarObligacion: function(data) {
            //Cargar los valores
            this.obligacion.id = data.id;
            this.obligacion.nombre = data.nombre;
            this.obligacion.valor = data.valor;
            this.obligacion.dia_repite = data.dia_repite;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },
        actualizarObligacion: function() {
            var url = (route('obligaciones.update').template).replace('{obligacione}',this.obligacion.id);
            axios.put(url, this.obligacion).then(
                response => {
                    toastr["success"]('La obligación ('+this.obligacion.nombre+') se actualizó correctamente');
                    this.limpiarObligacion();
                    this.limpiarErrores();
                    this.getObligaciones();
                    $( "#edit" ).modal('hide');
                }, response => {
                    this.errors = response.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar la obligación");
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr["error"]("Revisa la lista de errores","Error al actualizar la obligación");
                    $( ".errors-alert" ).show();
                });
        },
        eliminarObligacion: function(data) {
            var ban = confirm("¿Está seguro de eliminar la obligación?");
            if( ban ) {
                var url = (route('obligaciones.destroy').template).replace('{obligacione}',data.id);
                axios.delete(url).then(
                    response => {
                        toastr["warning"]('La obligación ('+data.nombre+') se eliminó correctamente');
                        this.limpiarObligacion();
                        this.limpiarErrores();
                        this.getObligaciones();
                    }, response => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar la obligación");
                        this.errors = response.response.data;
                        $( ".errors-alert" ).show();
                    }).catch(error => {
                        toastr["error"]("Revisa la lista de errores","Error al eliminar la obligación");
                        this.errors = error.response;
                        $( ".errors-alert" ).show();
                    });
            }
        },
    },
    computed: {
        /* filtroCategoriasTipos() {
            return this.listaCategoriasTipos.filter( ( tipo ) => tipo.categoria_general_id == this.categoria.categoria_general_id);
        } */
        diasMes() {
            let dias = [];
            let i = 1;
            for( i; i < 31; i++ ){
                if( i < 10 ) {
                    dias.push( '0' + i );    
                } else {
                    dias.push(i).toString();
                }
            }
            return dias;
        }
    }
});