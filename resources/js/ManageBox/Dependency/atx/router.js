import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'atx' }},
        {path: '/all', component: C.atx, name: 'atx'},
        {path: '/:alias/children', component: C.atx_child, name: 'atx_child'},
    ]
})




export default router;
