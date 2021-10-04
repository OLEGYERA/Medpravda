import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'substances' }},
        {path: '/all', component: C.substances, name: 'substances'},
    ]
})




export default router;
