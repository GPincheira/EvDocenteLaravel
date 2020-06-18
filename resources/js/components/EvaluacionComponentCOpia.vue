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

                            <tr v-for="evaluacion in arrayEvaluacions" :key="evaluacion.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                                <td v-text="evaluacion.RUTAcademico"></td>
                                <td v-text="evaluacion.NotaFinal"></td>
                                <td>
                                    <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                    <button class="btn" @click="loadFieldsUpdate(evaluacion)">Modificar</button>
                                    <!--Botón que borra la tarea que seleccionemos-->
                                    <button class="btn" @click="deleteEvaluacion(evaluacion)">Borrar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-md-6">
              <div class="form-group"><!-- Formulario para la creación o modificación-->
                <label>RUTAcademico</label>
                <input v-model="RUTAcademico" type="integer" class="form-control">


                <label>CodigoComision</label>
                <input v-model="CodigoComision" type="integer" class="form-control">

                <label>AÑo</label>
                <input v-model="año" type="integer" class="form-control">

                <label>P1</label>
                <input v-model="p1" type="integer" class="form-control">
                <label>N1</label>
                <input v-model="n1" type="float" class="form-control">
                <label>P2</label>
                <input v-model="p2" type="integer" class="form-control">
                <label>N2</label>
                <input v-model="n2" type="float" class="form-control">
                <label>P3</label>
                <input v-model="p3" type="integer" class="form-control">
                <label>N3</label>
                <input v-model="n3" type="float" class="form-control">
                <label>P4</label>
                <input v-model="p4" type="integer" class="form-control">
                <label>N4</label>
                <input v-model="n4" type="float" class="form-control">
                <label>P5</label>
                <input v-model="p5" type="integer" class="form-control">
                <label>N5</label>
                <input v-model="n5" type="float" class="form-control">
                <label>NotaFinal</label>
                <input v-model="NotaFinal" type="float" class="form-control">

                <label>Argumento</label>
                <input v-model="Argumento" type="string" class="form-control">
              </div>
              <div class="container-buttons">
                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                <button v-if="update == 0" @click="saveEvaluacions()" class="btn btn-success">Añadir</button>
                <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                <button v-if="update != 0" @click="updateEvaluacions()" class="btn btn-warning">Actualizar</button>
                <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                <button v-if="update != 0" @click="clearFields()" class="btn">Atrás</button>
              </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                RUTAcademico:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                CodigoComision:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                año:"",
                p1:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                n1:"",
                p2:"",
                n2:"",
                p3:"",
                n3:"",
                p4:"",
                n4:"",
                p5:"",
                n5:"",
                NotaFinal:"",
                Argumento:"",
                update:0,
                arrayEvaluacions:[],
                arrayDepartamentos:[]//Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{
        getEvaluacions(){
            let me =this;
            let url = '/tareas' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayEvaluacions = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
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

        saveEvaluacions(){
            let me =this;
            let url = '/tareas/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
            axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                'RUTAcademico':this.RUTAcademico,
                'CodigoComision':this.CodigoComision,
                'año':this.año,
                'p1':this.p1,
                'n1':this.n1,
                'p2':this.p2,
                'n2':this.n2,
                'p3':this.p3,
                'n3':this.n3,
                'p4':this.p4,
                'n4':this.n4,
                'p5':this.p5,
                'n5':this.n5,
                'NotaFinal':this.NotaFinal,
                'Argumento':this.Argumento
            }).then(function (response) {
                me.getEvaluacions();//llamamos al para que refresque nuestro array y muestro los nuevos datos
                me.clearFields();
            })
            .catch(function (error) {
                console.log(error);
            });
        },


        updateEvaluacions(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/tareas/actualizar',{
                    'id':this.update,
                    'p1':this.p1,
                    'n1':this.n1,
                    'p2':this.p2,
                    'n2':this.n2,
                    'p3':this.p3,
                    'n3':this.n3,
                    'p4':this.p4,
                    'n4':this.n4,
                    'p5':this.p5,
                    'n5':this.n5,
                    'NotaFinal':this.NotaFinal,
                    'Argumento':this.Argumento
                }).then(function (response) {
                   me.getEvaluacions();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.id
                let me =this;
                let url = '/tareas/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.p1= response.data.p1;
                    me.n1= response.data.n1;
                    me.p2= response.data.p2;
                    me.n2= response.data.n2;
                    me.p3= response.data.p3;
                    me.n3= response.data.n3;
                    me.p4= response.data.p4;
                    me.n4= response.data.n4;
                    me.p5= response.data.p5;
                    me.n5= response.data.n5;
                    me.NotaFinal= response.data.NotaFinal;
                    me.Argumento= response.data.Argumento;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        deleteEvaluacion(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
                let me =this;
                let evaluacion_id = data.id
                if (confirm('¿Seguro que deseas borrar esta tarea?')) {
                    axios.delete('/tareas/borrar/'+evaluacion_id
                    ).then(function (response) {
                        me.getEvaluacions();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
        },
        clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.RUTAcademico = "";
                this.CodigoComision = "";
                this.año = "";
                this.p1 = "";
                this.n1 = "";
                this.p2 = "";
                this.n2 = "";
                this.p3 = "";
                this.n3 = "";
                this.p4 = "";
                this.n4 = "";
                this.p5 = "";
                this.n5 = "";
                this.update = 0;
        }
    },
    mounted() {
      this.getEvaluacions();
      this.getDepartamentos();
    }
}
</script>
