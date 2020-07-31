

require('./bootstrap');


window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('panel', require('./components/Panel.vue').default);
Vue.component('colaboradores', require('./components/Colaboradores.vue').default);
Vue.component('vista1', require('./components/Vista1.vue').default);
Vue.component('nuevoT', require('./components/NuevoTrabajador.vue').default);
Vue.component('vistadetalle', require('./components/VistaDetalle.vue').default);
Vue.component('vistaPanel', require('./components/vistas/VistaPanel.vue').default);

import App from './components/App.vue'
import router from './routes'

const app = new Vue({
    el: '#app',
    components:{
        App
        

    },
    router
  
});

