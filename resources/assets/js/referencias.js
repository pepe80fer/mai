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
                estado: 1
            },
            listaCategoriasGlobales: [],
            listaCategorias: [],
            errors: []
        }
    },
    mounted(){
        this.getListaCategoriasGlobales();
        this.getListaCategorias();
    },
    methods: {
        limpiarErrores: function() {
            this.errors = [];
            $( ".errors-alert" ).hide();
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

        crearCategoriaRelacion: function() {
            var url = route('categoriasRelaciones.store').template;
            axios.post(url, this.referencia).then(
                response => {
                    this.limpiarErrores();
                    console.log("responde",response.data);
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

        pruebaReferencia: function(id) {
            console.log("pruebaReferencia",id);
        },

        crearReferencia: function() {
            // Primero se debe crear la relacion de las categorias
            // this.consultarCategoriaRelacion();return;
            this.crearCategoriaRelacion();
            return;


            var url = route('referencias.store').template;
            axios.post(url, this.referencia).then(
                response => {
                    this.limpiarErrores();
                    //Listar nuevamente las obligaciones
                    // this.getObligaciones();
                    $( "#create" ).modal('hide');
                    toastr.success('Referencia ('+this.referencia.nombre+') creada correctamente');
                    // this.limpiarObligacion();
                }, response => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = response.response.data;
                    $( ".errors-alert" ).show();
                }).catch(error => {
                    toastr["error"]("Revisa la lista de errores","Error al crear la referencia");
                    this.errors = error.response.data;
                    $( ".errors-alert" ).show();
                });
        }
    }
});