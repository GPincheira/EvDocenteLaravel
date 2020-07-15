<template>
  <form id="app" @submit="checkForm">

  <div class="contenedor">
      <div class="row">
          <div class="col-md-12">

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
                        <td><input type="number" v-model="p1"></td>
                        <td v-if="arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[0]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[0]"><div v-if="this.arrayN1[0]<4.5 || this.arrayN1[0]>5" class="error">Entre 4.5 y 5.0</div></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[2]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[1]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[1]"><div v-if="this.arrayN1[1]<4.0 || this.arrayN1[1]>4.4" class="error">Entre 4.0 y 4.4</div></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[3]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[2]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[2]"><div v-if="this.arrayN1[2]<3.5 || this.arrayN1[2]>3.9" class="error">Entre 3.5 y 3.9</div></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[4]>0"><input type="float" v-model="arrayN1[3]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[3]"><div v-if="this.arrayN1[3]<2.7 || this.arrayN1[3]>3.4" class="error">Entre 2.7 y 3.4</div></td>
                        <td v-if="arrayN1[0]>0 || arrayN1[1]>0 || arrayN1[2]>0 || arrayN1[3]>0"><input type="float" v-model="arrayN1[4]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN1[4]"><div v-if="this.arrayN1[4]<0.1 || this.arrayN1[4]>2.6" class="error">Menor de 2.6</div></td>
                        <td>{{n1=suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])}}<a>x</a>{{p1/100}}<a>=</a>{{x1=n1*p1/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">1. Actividades de Docencia</td>
                        <td><input type="number" v-model="p1"></td>
                        <td><input type="float" v-model="arrayN1[0]" disabled></td>
                        <td><input type="float" v-model="arrayN1[1]" disabled></td>
                        <td><input type="float" v-model="arrayN1[2]" disabled></td>
                        <td><input type="float" v-model="arrayN1[3]" disabled></td>
                        <td><input type="float" v-model="arrayN1[4]" disabled></td>
                        <td>{{n1=suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])}}<a>x</a>{{p1/100}}<a>=</a>{{x1=n1*p1/100}} </td>
                      </tr>
                      <tr v-if="p2>0">
                        <td class="izq">2. Actividades de Investigación</td>
                        <td><input type="number" v-model="p2"></td>
                        <td v-if="arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[0]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[0]"><div v-if="this.arrayN2[0]<4.5 || this.arrayN2[0]>5" class="error">Entre 4.5 y 5.0</div></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[2]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[1]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[1]"><div v-if="this.arrayN2[1]<4.0 || this.arrayN2[1]>4.4" class="error">Entre 4.0 y 4.4</div></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[3]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[2]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[2]"><div v-if="this.arrayN2[2]<3.5 || this.arrayN2[2]>3.9" class="error">Entre 3.5 y 3.9</div></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[4]>0"><input type="float" v-model="arrayN2[3]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[3]"><div v-if="this.arrayN2[3]<2.7 || this.arrayN2[3]>3.4" class="error">Entre 2.7 y 3.4</div></td>
                        <td v-if="arrayN2[0]>0 || arrayN2[1]>0 || arrayN2[2]>0 || arrayN2[3]>0"><input type="float" v-model="arrayN2[4]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN2[4]"><div v-if="this.arrayN2[4]<0.1 || this.arrayN2[4]>2.6" class="error">Menor de 2.6</div></td>
                        <td>{{n2=suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])}}<a>x</a>{{p2/100}}<a>=</a>{{x2=n2*p2/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">2. Actividades de Investigación</td>
                        <td><input type="number" v-model="p2"></td>
                        <td><input type="float" v-model="arrayN2[0]" disabled></td>
                        <td><input type="float" v-model="arrayN2[1]" disabled></td>
                        <td><input type="float" v-model="arrayN2[2]" disabled></td>
                        <td><input type="float" v-model="arrayN2[3]" disabled></td>
                        <td><input type="float" v-model="arrayN2[4]" disabled></td>
                        <td>{{n2=suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])}}<a>x</a>{{p2/100}}<a>=</a>{{x2=n2*p2/100}} </td>
                      </tr>
                      <tr v-if="p3>0">
                        <td class="izq">3. Extension y Vinculación</td>
                        <td><input type="number" v-model="p3"></td>
                        <td v-if="arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[0]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[0]"><div v-if="this.arrayN3[0]<4.5 || this.arrayN3[0]>5" class="error">Entre 4.5 y 5.0</div></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[2]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[1]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[1]"><div v-if="this.arrayN3[1]<4.0 || this.arrayN3[1]>4.4" class="error">Entre 4.0 y 4.4</div></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[3]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[2]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[2]"><div v-if="this.arrayN3[2]<3.5 || this.arrayN3[2]>3.9" class="error">Entre 3.5 y 3.9</div></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[4]>0"><input type="float" v-model="arrayN3[3]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[3]"><div v-if="this.arrayN3[3]<2.7 || this.arrayN3[3]>3.4" class="error">Entre 2.7 y 3.4</div></td>
                        <td v-if="arrayN3[0]>0 || arrayN3[1]>0 || arrayN3[2]>0 || arrayN3[3]>0"><input type="float" v-model="arrayN3[4]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN3[4]"><div v-if="this.arrayN3[4]<0.1 || this.arrayN3[4]>2.6" class="error">Menor de 2.6</div></td>
                        <td>{{n3=suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])}}<a>x</a>{{p3/100}}<a>=</a>{{x3=n3*p3/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">3. Extension y Vinculación</td>
                        <td><input type="number" v-model="p3"></td>
                        <td><input type="float" v-model="arrayN3[0]" disabled></td>
                        <td><input type="float" v-model="arrayN3[1]" disabled></td>
                        <td><input type="float" v-model="arrayN3[2]" disabled></td>
                        <td><input type="float" v-model="arrayN3[3]" disabled></td>
                        <td><input type="float" v-model="arrayN3[4]" disabled></td>
                        <td>{{n3=suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])}}<a>x</a>{{p3/100}}<a>=</a>{{x3=n3*p3/100}} </td>
                      </tr>
                      <tr v-if="p4>0">
                        <td class="izq">4. Administración Académica</td>
                        <td><input type="number" v-model="p4"></td>
                        <td v-if="arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[0]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[0]"><div v-if="this.arrayN4[0]<4.5 || this.arrayN4[0]>5" class="error">Entre 4.5 y 5.0</div></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[2]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[1]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[1]"><div v-if="this.arrayN4[1]<4.0 || this.arrayN4[1]>4.4" class="error">Entre 4.0 y 4.4</div></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[3]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[2]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[2]"><div v-if="this.arrayN4[2]<3.5 || this.arrayN4[2]>3.9" class="error">Entre 3.5 y 3.9</div></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[4]>0"><input type="float" v-model="arrayN4[3]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[3]"><div v-if="this.arrayN4[3]<2.7 || this.arrayN4[3]>3.4" class="error">Entre 2.7 y 3.4</div></td>
                        <td v-if="arrayN4[0]>0 || arrayN4[1]>0 || arrayN4[2]>0 || arrayN4[3]>0"><input type="float" v-model="arrayN4[4]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN4[4]"><div v-if="this.arrayN4[4]<0.1 || this.arrayN4[4]>2.6" class="error">Menor de 2.6</div></td>
                        <td>{{n4=suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])}}<a>x</a>{{p4/100}}<a>=</a>{{x4=n4*p4/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">4. Administración Académica</td>
                        <td><input type="number" v-model="p4"></td>
                        <td><input type="float" v-model="arrayN4[0]" disabled></td>
                        <td><input type="float" v-model="arrayN4[1]" disabled></td>
                        <td><input type="float" v-model="arrayN4[2]" disabled></td>
                        <td><input type="float" v-model="arrayN4[3]" disabled></td>
                        <td><input type="float" v-model="arrayN4[4]" disabled></td>
                        <td>{{n4=suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])}}<a>x</a>{{p4/100}}<a>=</a>{{x4=n4*p4/100}} </td>
                      </tr>
                      <tr v-if="p5>0">
                        <td class="izq">5. Otras actividades realizadas</td>
                        <td><input type="number" v-model="p5"></td>
                        <td v-if="arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[0]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[0]"><div v-if="this.arrayN5[0]<4.5 || this.arrayN5[0]>5" class="error">Entre 4.5 y 5.0</div></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[2]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[1]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[1]"><div v-if="this.arrayN5[1]<4.0 || this.arrayN5[1]>4.4" class="error">Entre 4.0 y 4.4</div></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[3]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[2]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[2]"><div v-if="this.arrayN5[2]<3.5 || this.arrayN5[2]>3.9" class="error">Entre 3.5 y 3.9</div></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[4]>0"><input type="float" v-model="arrayN5[3]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[3]"><div v-if="this.arrayN5[3]<2.7 || this.arrayN5[3]>3.4" class="error">Entre 2.7 y 3.4</div></td>
                        <td v-if="arrayN5[0]>0 || arrayN5[1]>0 || arrayN5[2]>0 || arrayN5[3]>0"><input type="float" v-model="arrayN5[4]" disabled></td>
                        <td v-else><input type="float" v-model="arrayN5[4]"><div v-if="this.arrayN5[4]<0.1 || this.arrayN5[4]>2.6" class="error">Menor de 2.6</div></td>
                        <td>{{n5=suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])}}<a>x</a>{{p5/100}}<a>=</a>{{x5=n5*p5/100}} </td>
                      </tr>
                      <tr v-else>
                        <td class="izq">5. Otras actividades realizadas</td>
                        <td><input type="number" v-model="p5"></td>
                        <td><input type="float" v-model="arrayN5[0]" disabled></td>
                        <td><input type="float" v-model="arrayN5[1]" disabled></td>
                        <td><input type="float" v-model="arrayN5[2]" disabled></td>
                        <td><input type="float" v-model="arrayN5[3]" disabled></td>
                        <td><input type="float" v-model="arrayN5[4]" disabled></td>
                        <td>{{n5=suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])}}<a>x</a>{{p5/100}}<a>=</a>{{x5=n5*p5/100}} </td>
                      </tr>
                    <tr>
                      <th class="izq" colspan="7">Nota Final
                      </th>
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

            <div class="col-md-12 margin-tb container">
                <h3>IV. ARGUMENTOS DE LA CALIFICACION FINAL</h3>
                <div class="col-md-12 margin-tb container">
                        <input v-model="Argumento" type="string" class="form-control" style="background-color:white">
                        Caracteres: {{ this.Argumento.length }}
                        <div v-if="this.Argumento.length >= 100" class="error">(Maximo 100 caracteres)</div>
                </div>
          </div>

    <div class="row">
            <div class="col-md-12 content">
              <div class="container-buttons">
                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                <div v-if="parseFloat(this.p1)+parseFloat(this.p2)+parseFloat(this.p3)+parseFloat(this.p4)+parseFloat(this.p5) == 100 && this.n1<=5 && this.n2<=5 && this.n3<=5 && this.n4<=5 && this.n5<=5 && this.Argumento.length <= 100">
                  <button @click="saveEvaluacions()" class="btn btn-success" style="margin:12px">Añadir</button>
                </div>
                <div v-else>
                  <button @click="saveEvaluacions()" class="btn btn-success" style="margin:12px" disabled>Añadir</button>
                  <div v-if="parseFloat(this.p1)+parseFloat(this.p2)+parseFloat(this.p3)+parseFloat(this.p4)+parseFloat(this.p5) != 100">
                    <p class="error">Los porcentajes deben sumar 100%</p>
                  </div>
                </div>
              </div>
            </div>
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
                errors: [],
            }
        },
        methods:{
        checkForm: function (e) {
        this.errors = [];
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
        saveEvaluacions(){
              let me =this;
              let url = '/evsjson/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
              axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                  'RUTAcademico': this.datito,
                  'Argumento':this.Argumento,
                  'NotaFinal':this.NotaFinal,
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
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    }
}
</script>

<style>
input {
  width: 90px;
}
.error {
  color: red;
  font-size: 12px;
  text-transform: uppercase;
}
</style>
