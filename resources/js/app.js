//Carga de librerias para la utilizacion de Vue
require('./bootstrap');
window.Vue = require('vue');

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

//Registro de componentes que son utilizadas en el proyecto
Vue.component('evaluacion-component', require('./components/EvaluacionComponent.vue').default);
Vue.component('editarev-component', require('./components/EditarEvComponent.vue').default);

//Instancia de la aplicacion de Vue
 window.onload = function () {
     var app = document.getElementById('app');
     if (app) {
         const app = new Vue({
             el: '#app',
         });
     }
 };
