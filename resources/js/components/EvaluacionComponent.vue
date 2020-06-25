<template>

  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="row content">
              <div class="col-lg-12 margin-tb">
                <h1>PAUTA RESUMEN</h1>
              </div>
            </div>

            <div class="row container">
                <h3>I. IDENTIFICACION</h3>
            </div>

            <div class="container">
            	<div class="row">
            		<div class="col-md-12">
            			<table class="table table-bordered content">
            				<tbody>
            					<tr>
            						<td height=40></td>
            						<td></td>
            					</tr>
                      <tr class="table-active">
            						<td width="50%">Académico</td>
            						<td width="50%">Departamento</td>
            					</tr>
                      <tr high="20px">
            						<td height=40></td>
            						<td></td>
            					</tr>
                      <tr class="table-active" height="4%">
            						<td>Facultad o Instituto al que pertenece</td>
            						<td>Periodo que se evalua</td>
            					</tr>
                      <tr>
            						<td height=40></td>
            						<td></td>
            					</tr>
                      <tr class="table-active">
            						<td>Título Profesional</td>
            						<td>Horas de Contrato</td>
            					</tr>
                      <tr>
            						<td height=40></td>
            						<td></td>
            					</tr>
                      <tr class="table-active">
            						<td>Categoría</td>
            						<td>Grado Académico</td>
            					</tr>
                      <tr>
            						<td height=40></td>
            						<td></td>
            					</tr>
                      <tr class="table-active">
            						<td>Calificación Anterior</td>
            						<td>Tipo de Planta</td>
            					</tr>
            				</tbody>
            			</table>
            		</div>
            	</div>
            </div>

            <div class="row container">
                <h3>II. CALIFICACION ACADEMICA</h3>
            </div>

            <div class="container">
              <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered content">
                  <tbody>
                    <tr>
                      <th rowspan="2" width="32%"></th>
                      <th rowspan="2" width="20%">% tiempo asignado a tareas programadas</th>
                      <th colspan="5" width="40%">Calificacion</th>
                      <th width="8%">Pond</th>
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
                        <td>{{ x1=promparcial(p1,suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])) }}</td>
                      </tr>
                      <tr v-else>
                        <td class="izq">1. Actividades de Docencia</td>
                        <td><input type="number" v-model="p1" max="100"></td>
                        <td><input type="float" v-model="arrayN1[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN1[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN1[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN1[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN1[4]" min="0" max="2.6" disabled></td>
                        <td>{{ x1=promparcial(p1,suma(p1,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])) }}</td>
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
                        <td>{{ x2=promparcial(p2,suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])) }}</td>
                      </tr>
                      <tr v-else>
                        <td class="izq">2. Actividades de Investigación</td>
                        <td><input type="number" v-model="p2" max="100"></td>
                        <td><input type="float" v-model="arrayN2[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN2[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN2[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN2[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN2[4]" min="0" max="2.6" disabled></td>
                        <td>{{ x2=promparcial(p2,suma(p2,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])) }}</td>
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
                        <td>{{ x3=promparcial(p3,suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])) }}</td>
                      </tr>
                      <tr v-else>
                        <td class="izq">3. Extension y Vinculación</td>
                        <td><input type="number" v-model="p3" max="100"></td>
                        <td><input type="float" v-model="arrayN3[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN3[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN3[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN3[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN3[4]" min="0" max="2.6" disabled></td>
                        <td>{{ x3=promparcial(p3,suma(p3,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])) }}</td>
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
                        <td>{{ x4=promparcial(p4,suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])) }}</td>
                      </tr>
                      <tr v-else>
                        <td class="izq">4. Administración Académica</td>
                        <td><input type="number" v-model="p4" max="100"></td>
                        <td><input type="float" v-model="arrayN4[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN4[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN4[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN4[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN4[4]" min="0" max="2.6" disabled></td>
                        <td>{{ x4=promparcial(p4,suma(p4,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])) }}</td>
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
                        <td>{{ x5=promparcial(p5,suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])) }}</td>
                      </tr>
                      <tr v-else>
                        <td class="izq">5. Otras actividades realizadas</td>
                        <td><input type="number" v-model="p5" max="100"></td>
                        <td><input type="float" v-model="arrayN5[0]" min="4.5" max="5" disabled></td>
                        <td><input type="float" v-model="arrayN5[1]" min="4.0" max="4.4" disabled></td>
                        <td><input type="float" v-model="arrayN5[2]" min="3.5" max="3.9" disabled></td>
                        <td><input type="float" v-model="arrayN5[3]" min="2.7" max="3.4" disabled></td>
                        <td><input type="float" v-model="arrayN5[4]" value="0" min="0" max="2.6" disabled></td>
                        <td>{{ x5=promparcial(p5,suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])) }}</td>
                      </tr>
                    <tr>
                      <th class="izq" colspan="7">Nota Final</th>
                      <td>{{ pf=promedio(x1,x2,x3,x4,x5) }}</td>
                    </tr>
                  </tbody>
                </table>

                <p><label for="RUTAcademico">RUTAcademico</label>
                <input id="RUTAcademico" v-model="RUTAcademico" type="number" name="RUTAcademico"></p>
                <p><label for="CodigoComision">CodigoComision</label>
                <input id="CodigoComision" v-model="CodigoComision" type="number" name="CodigoComision"></p>
                <p><label for="año">año</label>
                <input id="año" v-model="año" type="number" name="año"></p>
                <p><label for="Argumento">Argumento</label>
                <input id="Argumento" v-model="Argumento" type="text" name="Argumento"></p>
                {{n1=suma(p5,arrayN1[0],arrayN1[1],arrayN1[2],arrayN1[3],arrayN1[4])}}
                {{n2=suma(p5,arrayN2[0],arrayN2[1],arrayN2[2],arrayN2[3],arrayN2[4])}}
                {{n3=suma(p5,arrayN3[0],arrayN3[1],arrayN3[2],arrayN3[3],arrayN3[4])}}
                {{n4=suma(p5,arrayN4[0],arrayN4[1],arrayN4[2],arrayN4[3],arrayN4[4])}}
                {{n5=suma(p5,arrayN5[0],arrayN5[1],arrayN5[2],arrayN5[3],arrayN5[4])}}

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

</template>

<script>
    export default {
        data(){
            return{
                RUTAcademico:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                CodigoComision:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                año:"",
                NotaFinal:"",
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
                arrayDepartamentos:[]//Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{
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
            let url = '/blabla' //Ruta que hemos creado para que nos devuelva todas las tareas
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
            let url = '/blabla/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
            axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                'RUTAcademico':this.RUTAcademico,
                'CodigoComision':this.CodigoComision,
                'Argumento':this.Argumento,
                'NotaFinal':this.pf,
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
        updateEvaluacions(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/tareas/actualizar',{
                    'id':this.update,
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
                    me.id= response.data.id;
                    me.RUTAcademico= response.data.RUTAcademico;
                    me.CodigoComision= response.data.CodigoComision;
                    me.año= response.data.año;
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

</style>
