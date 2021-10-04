import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'pharmas' }},
        {path: '/all', component: C.pharmas, name: 'pharmas'},
        {path: '/all/redirected/:alias', component: C.pharmas, name: 'pharmas'},
    ]
})




export default router;
