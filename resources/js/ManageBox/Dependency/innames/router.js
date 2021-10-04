import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'innames' }},
        {path: '/all', component: C.innames, name: 'innames'},
        {path: '/all/redirected/:alias', component: C.innames, name: 'innames'},
    ]
})




export default router;
