import Vue from 'vue'
import Router from 'vue-router'
import Example from './components/VistaDetalle'
import VistaP from './components/vistas/VistaPanel'
import Bienvenido from './components/vistas/Bienvenido'
Vue.use(Router)

export default new Router({
    routes: [
       
        {
            path:'/detalle/:id?',
            name:'detalle',
            component: Example
        },
        {
            path:'/',
            name:'home',
            component: VistaP
        },

    ],
    mode: 'history'
})