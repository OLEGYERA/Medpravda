import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'cosmetic' }},
        {path: '/all', component: C.cosmetic, name: 'cosmetic'},
        {path: '/:alias/children', component: C.cosmetic_child, name: 'cosmetic_child'},
    ]
})




export default router;
