import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'fabricators' }},
        {path: '/all', component: C.fabricators, name: 'fabricators'},
        {path: '/:alias/locations', component: C.locations, name: 'locations'},
    ]
})




export default router;
