import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'bad' }},
        {path: '/all', component: C.bad, name: 'bad'},
        {path: '/:alias/children', component: C.bad_child, name: 'bad_child'},
    ]
})




export default router;
