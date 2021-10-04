import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'ware' }},
        {path: '/all', component: C.ware, name: 'ware'},
        {path: '/:alias/children', component: C.ware_child, name: 'ware_child'},
    ]
})




export default router;
