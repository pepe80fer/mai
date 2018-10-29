/**
 * Componente referencias
 */
Vue.component('referencias',{
    props: [],
    data() {
        return {
            // data: referencia
            referencia: {
                categoria_global_id: '',
                categoria_id: '',
                nombre: '',
                codigo: '',
                estado: 1,
                categoria_relacion_id: null
            },
            listaCategoriasGlobales: [],
            listaCategorias: [],
            listaReferencias: [],
            errors: []
        }
    },
    mounted(){
        this.getListaCategoriasGlobales();
        this.getListaCategorias();
        // this.getListaReferencias();
    },
    methods: {
        limpiarErrores: function() {
            this.errors = [];
            $( ".errors-alert" ).hide();
        },

        limpiarReferencia: function() {
            this.referencia = {
                categoria_global_id: '',
                categoria_id: '',
                nombre: '',
                codigo: '',
                estado: 1,
                categoria_relacion_id: null
            }
        },

        getListaCategoriasGlobales: function(){
            var url = (route('categoriasglobales.data').template);
            axios.get( url ).then(
                response => {
                    this.listaCategoriasGlobales = response.data;
                }, response => {
                    console.error('Error getListaCategoriasGlobales');
                }
            )
        },

        getListaCategorias: function(){
            var url = (route('categorias.data').template);
            axios.get( url ).then(
                response => {
                    this.listaCategorias = response.data;
                }, response => {
                    console.error('Error getListaCategorias');
                }
            )
        },

        getListaReferencias: function() {
            var url = (route('referencias.data').template);
            axios.get( url ).then(
                response => {
                    this.listaReferencias = response.data;
                }, response => {
                    console.error('Error getListaCategorias');
                }
            )
        },

        crearCategoriaRelacion: function() {
            var url = route('categoriasRelaciones.store').template;
            axios.post(url, this.referencia).then(
                response => {
                    this.limpiarErrores();
                    this.referencia.categoria_relacion_id = response.data;
                    // toastr.success('Referencia creada correctamente');
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },

        consultarCategoriaRelacion: function() {
            var url = route('categoriasRelaciones.show').template;
            axios.post(url, this.referencia).then(
                response => {
                    this.limpiarErrores();
                    console.log("responde",response.data.id);
                    this.pruebaReferencia(response.data.id);
                    toastr.success('Referencia creada correctamente');
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },

        crearReferencia: function() {
            // Primero se debe crear la relacion de las categorias
            this.crearCategoriaRelacion();

            var url = route('referencias.store').template;
            axios.post(url, this.referencia).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente las obligaciones
                    this.getListaReferencias();
                    $( "#create" ).modal('hide');
                    toastr.success('Referencia ('+this.referencia.nombre+') creada correctamente');
                    this.limpiarReferencia();
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        },

        editarReferencia: function(data) {
            //Cargar los valores
            this.referencia.id = data.id;
            this.referencia.nombre = data.nombre;
            this.referencia.codigo = data.codigo;
            this.referencia.categoria_global_id = data.categoria_relacion.categoria_global_id;
            this.referencia.categoria_id = data.categoria_relacion.categoria_id;
            this.limpiarErrores();
            //mostrar el modal
            $( "#edit" ).modal('show');
        },

        actualizarReferencia: function(id) {
            var url = (route('referencia.update').template).replace('{referencia}',id);
            axios.put(url, this.referencia).then(
                response => {
                    toastr["success"]('La referencia ('+this.referencia.nombre+') se actualizó correctamente');
                    this.limpiarReferencia();
                    this.limpiarErrores();
                    this.getListaReferencias();
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

        eliminarReferencia: function(data) {
            var ban = confirm("¿Está seguro de eliminar la referencia?");
            if( ban ) {
                var url = (route('referencia.destroy').template).replace('{referencia}',data.id);
                axios.delete(url).then(
                    response => {
                        toastr["warning"]('La referencia ('+data.nombre+') se eliminó correctamente');
                        this.limpiarReferencia();
                        this.limpiarErrores();
                        this.getListaReferencias();
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
    }
});