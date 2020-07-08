<template>
  <form id="app" @submit="checkForm">

    <p v-if="errors.length">
      <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
      <ul>
        <li v-for="error in errors">{{ error }}</li>
      </ul>
    </p>

  <div class="contenedor">
      <div class="row">
          <div class="col-md-12">
            <div class="row content">
              <div class="col-lg-12 margin-tb">
                <h1>PAUTA RESUMEN</h1>
              </div>
            </div>

            <div class="row container">
                <h3>I. IDENTIFICACION</h3>
                {{ datito }}
            </div>

            <div class="col-md-12 margin-tb container">
                    <label for="RUTAcademico">RUT</label>
                    <input v-model="RUTAcademico" type="number" class="form-control" style="background-color:white">
            </div>
            <div class="col-md-12 margin-tb container">
                    <label for="CodigoComision">Codigo Comision</label>
                    <input v-model="CodigoComision" type="number" class="form-control" style="background-color:white">
            </div>
            <div class="col-md-12 margin-tb container">
                    <label for="CodigoFacultad">Codigo Facultad</label>
                    <input v-model="CodigoFacultad" type="number" class="form-control" style="background-color:white">
            </div>
            <div class="col-md-12 margin-tb container">
                    <label for="año">Año</label>
                    <input v-model="año" type="number" class="form-control" style="background-color:white"><br>
            </div>

            <div class="row container">
                <h3>II. CALIFICACION ACADEMICA</h3>
            </div>

            <div class="container">
              <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered content compact-table">
                  <tbody>
                    <tr>
                      <th rowspan="2" width="22%"></th>
                      <th rowspan="2" width="18%">% tiempo asignado a tareas programadas</th>
                      <th colspan="5" width="40%">Calificacion</th>
                      <th width="20%">Pond</th>
                    </tr>
                    <tr>
                      <th width="8%">E</th>
                      <th width="8%">MB</th>
                      <th width="8%">B</th>
                      <th width="8%">R</th>
                      <th width="8%">I</th>
                      <th>%T*C/100</th>
                    </tr>
                      <tr v-if="p1>0">
                        <td class="izq">1. Actividades de Docencia</td>
                        <td><input type="number" v-model="p1" max="100"></td>
                        <td v-if="arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[0]" min="4.5" max="5" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[0]" min="4.5" max="5"></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[2]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[1]" min="4.0" max="4.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[1]" min="4.0" max="4.4"></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[2]" min="3.5" max="3.9" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[2]" min="3.5" max="3.9"></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[3]" min="2.7" max="3.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[3]" min="2.7" max="3.4"></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[3]>0"><input type="float" v-model="arrayN1[4]" min="0" max="2.6" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[4]" min="0" max="2.6"></td>
                        <td>{{n1=suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])}}<a>x</a>{{p1/100}}<a>=</a>{{x1=n1*p1/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">1. Actividades de Docencia</td>
                        <td><input type="number" v-model="p1" max="100"></td>
                        <td><input type="float" v-model="arrayN1[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN1[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN1[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN1[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN1[4]" min="0" max="2.6" disabled></td>
                        <td>{{n1=suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])}}<a>x</a>{{p1/100}}<a>=</a>{{x1=n1*p1/100}} </td>
                      </tr>
                      <tr v-if="p2>0">
                        <td class="izq">2. Actividades de Investigación</td>
                        <td><input type="number" v-model="p2" max="100"></td>
                        <td v-if="arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[0]" min="4.5" max="5" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[0]" min="4.5" max="5"></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[2]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[1]" min="4.0" max="4.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[1]" min="4.0" max="4.4"></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[2]" min="3.5" max="3.9" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[2]" min="3.5" max="3.9"></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[3]" min="2.7" max="3.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[3]" min="2.7" max="3.4"></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[3]>0"><input type="float" v-model="arrayN2[4]" min="0" max="2.6" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[4]" min="0" max="2.6"></td>
                        <td>{{n2=suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])}}<a>x</a>{{p2/100}}<a>=</a>{{x2=n2*p2/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">2. Actividades de Investigación</td>
                        <td><input type="number" v-model="p2" max="100"></td>
                        <td><input type="float" v-model="arrayN2[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN2[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN2[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN2[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN2[4]" min="0" max="2.6" disabled></td>
                        <td>{{n2=suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])}}<a>x</a>{{p2/100}}<a>=</a>{{x2=n2*p2/100}} </td>
                      </tr>
                      <tr v-if="p3>0">
                        <td class="izq">3. Extension y Vinculación</td>
                        <td><input type="number" v-model="p3" max="100"></td>
                        <td v-if="arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[0]" min="4.5" max="5" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[0]" min="4.5" max="5"></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[2]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[1]" min="4.0" max="4.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[1]" min="4.0" max="4.4"></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[2]" min="3.5" max="3.9" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[2]" min="3.5" max="3.9"></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[3]" min="2.7" max="3.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[3]" min="2.7" max="3.4"></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[3]>0"><input type="float" v-model="arrayN3[4]" min="0" max="2.6" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[4]" min="0" max="2.6"></td>
                        <td>{{n3=suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])}}<a>x</a>{{p3/100}}<a>=</a>{{x3=n3*p3/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">3. Extension y Vinculación</td>
                        <td><input type="number" v-model="p3" max="100"></td>
                        <td><input type="float" v-model="arrayN3[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN3[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN3[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN3[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN3[4]" min="0" max="2.6" disabled></td>
                        <td>{{n3=suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])}}<a>x</a>{{p3/100}}<a>=</a>{{x3=n3*p3/100}} </td>
                      </tr>
                      <tr v-if="p4>0">
                        <td class="izq">4. Administración Académica</td>
                        <td><input type="number" v-model="p4" max="100"></td>
                        <td v-if="arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[0]" min="4.5" max="5" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[0]" min="4.5" max="5"></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[2]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[1]" min="4.0" max="4.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[1]" min="4.0" max="4.4"></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[2]" min="3.5" max="3.9" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[2]" min="3.5" max="3.9"></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[3]" min="2.7" max="3.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[3]" min="2.7" max="3.4"></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[3]>0"><input type="float" v-model="arrayN4[4]" min="0" max="2.6" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[4]" min="0" max="2.6"></td>
                        <td>{{n4=suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])}}<a>x</a>{{p4/100}}<a>=</a>{{x4=n4*p4/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">4. Administración Académica</td>
                        <td><input type="number" v-model="p4" max="100"></td>
                        <td><input type="float" v-model="arrayN4[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN4[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN4[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN4[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN4[4]" min="0" max="2.6" disabled></td>
                        <td>{{n4=suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])}}<a>x</a>{{p4/100}}<a>=</a>{{x4=n4*p4/100}} </td>
                      </tr>
                      <tr v-if="p5>0">
                        <td class="izq">5. Otras actividades realizadas</td>
                        <td><input type="number" v-model="p5" max="100"></td>
                        <td v-if="arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[0]" min="4.5" max="5" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[0]" min="4.5" max="5"></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[2]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[1]" min="4.0" max="4.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[1]" min="4.0" max="4.4"></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[2]" min="3.5" max="3.9" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[2]" min="3.5" max="3.9"></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[3]" min="2.7" max="3.4" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[3]" min="2.7" max="3.4"></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[3]>0"><input type="float" v-model="arrayN5[4]" min="0" max="2.6" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[4]" min="0" max="2.6"></td>
                        <td>{{n5=suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])}}<a>x</a>{{p5/100}}<a>=</a>{{x5=n5*p5/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">5. Otras actividades realizadas</td>
                        <td><input type="number" v-model="p5" max="100"></td>
                        <td><input type="float" v-model="arrayN5[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN5[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN5[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN5[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN5[4]" value="0" min="0" max="2.6" disabled></td>
                        <td>{{n5=suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])}}<a>x</a>{{p5/100}}<a>=</a>{{x5=n5*p5/100}} </td>
                      </tr>
                    <tr>
                      <th class="izq" colspan="7">Nota Final</th>
                      <td>{{ NotaFinal=parseFloat(x1) + parseFloat(x2)+ parseFloat(x3) + parseFloat(x4) + parseFloat(x5) }}</td>
                    </tr>
                  </tbody>
                </table>

                </div>
              </div>
            </div>

            <div class="row container">
                <h3>III. ESCALA EVALUATIVA</h3>
            </div>

            <div class="row container">
                    <div class="col-md-12 margin-tb container">
                        <div class="card card-active" style="background-color:rgba(200,200,200)">
                            <div class="card-body">
                              <div class="col-md-3">
                                ESCALA:
                              </div>
                              <div class="col-md-3">
                                Excelente=4.5 a 5<br>
                                Regular=2.7 a 3.4
                              </div>
                              <div class="col-md-3">
                                Muy Bueno=4.0 a 4.4<br>
                                Deficiente=menos de 2.7
                              </div>
                              <div class="col-md-3">
                                Bueno=3.5 a 3.9
                              </div>
                          </div>
                      </div>
                  </div>
            </div>

            <div class="row container">
                <h3>IV. ARGUMENTOS DE LA CALIFICACION FINAL</h3>
                <div class="col-md-12 margin-tb container">
                        <input v-model="Argumento" type="string" class="form-control" style="background-color:white">
                </div>
            </div>
          </div>
      </div>

    <div class="row">
            <div class="col-md-12 content">
              <div class="container-buttons">
                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                <button @click="saveEvaluacions()" class="btn btn-success" style="margin:12px">Añadir</button>
              </div>
            </div>
        </div>
    </div>
</form>



</template>

<script>
    export default {
        props:['datito'],
        data(){
            return{
                RUTAcademico:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                CodigoComision:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                CodigoFacultad:"",
                año:"",
                NotaFinal:0,
                Argumento:"",
                p1: 0,
                p2: 0,
                p3: 0,
                p4: 0,
                p5: 0,
                n1: 0,
                n2: 0,
                n3: 0,
                n4: 0,
                n5: 0,
                arrayN1: [0,0,0,0,0],
                arrayN2: [0,0,0,0,0],
                arrayN3: [0,0,0,0,0],
                arrayN4: [0,0,0,0,0],
                arrayN5: [0,0,0,0,0],
                x1: 0,
                x2: 0,
                x3: 0,
                x4: 0,
                x5: 0,
                update:0,
                arrayEvaluacions:[],//Este array contendrá las tareas de nuestra bd
                arrayDepartamentos:[],//Este array contendrá las tareas de nuestra bd
                errors: []
            }
        },
        methods:{
        checkForm: function (e) {
          this.errors = [];
          if (!this.CodigoComision){
            this.errors.push('Comision es obligatoria');
          }
          if (!this.año){
            this.errors.push('El año es obligatorio');
          }
          if (parseFloat(this.p1)+parseFloat(this.p2)+parseFloat(this.p3)+parseFloat(this.p4)+parseFloat(this.p5) != 100){
            this.errors.push('Los procentajes deben sumar 100%');
          }
          if (!this.errors.length) {
            return true;
          }
          e.preventDefault();
        },
        suma (p,a,b,c,d,e) {
          let fila = parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e)
          if(p==0) fila = 0
          return fila
        },
        promparcial (nota,p){
          let parcial = (parseInt(p)/100)*nota
          return parcial
        },
        promedio (n1,n2,n3,n4,n5){
          let final = n1+n2+n3+n4+n5
          return final
        },
        getEvaluacions(){
            let me =this;
            let url = '/evsjson' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayEvaluacions = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        saveEvaluacions(){
            let me =this;
            let url = '/evsjson/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
            axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                'RUTAcademico': this.RUTAcademico,
                'CodigoComision':this.CodigoComision,
                'CodigoFacultad':this.CodigoFacultad,
                'Argumento':this.Argumento,
                'NotaFinal':this.NotaFinal,
                'año':this.año,
                'p1':this.p1,
                'p2':this.p2,
                'p3':this.p3,
                'p4':this.p4,
                'p5':this.p5,
                'n1':this.n1,
                'n2':this.n2,
                'n3':this.n3,
                'n4':this.n4,
                'n5':this.n5,
            }).then(function (response) {
                me.getEvaluacions();//llamamos al para que refresque nuestro array y muestro los nuevos datos
                me.clearFields();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.RUTAcademico = "";
                this.CodigoComision = "";
                this.CodigoFacultad = "";
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
                this.Argumento = "";
        }
    },
    mounted() {
      this.getEvaluacions();
    }
}
</script>

<style>
input {
  width: 90px;
}
</style>
