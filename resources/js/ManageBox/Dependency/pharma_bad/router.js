import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'pharma_bads' }},
        {path: '/all', component: C.pharma_bads, name: 'pharma_bads'},
        {path: '/all/redirected/:alias', component: C.pharma_bads, name: 'pharma_bads'},
    ]
})




export default router;
