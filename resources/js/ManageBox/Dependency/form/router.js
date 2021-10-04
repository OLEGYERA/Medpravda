import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'forms' }},
        {path: '/all', component: C.forms, name: 'forms'},
        {path: '/all/redirected/:alias', component: C.forms, name: 'forms'},
    ]
})




export default router;
