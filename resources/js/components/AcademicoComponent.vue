<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Lista de Evaluaciones</h2>
                <table class="table text-center"><!--Creamos una tabla que mostrará todas las evaluaciones-->
                        <thead>
                            <tr>
                            <th scope="col">RUT</th>
                            <th scope="col">Nota Final</th>
                            </tr>
                        </thead>
                        <tbody>

                          <tr v-for="departamento in arrayDepartamentos" :key="departamento.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                              <td v-text="departamento.id"></td>
                              <td v-text="departamento.Nombre"></td>
                          </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                Nombre:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                CodigoFacultad:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0,
                arrayDepartamentos:[], //Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{
        getDepartamentos(){
            let me =this;
            let url = '/dptos' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayDepartamentos = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
    },
    mounted() {
      this.getDepartamentos();
    }
}
</script>
