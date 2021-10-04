import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [
        {path: '/', redirect: { name: 'terms' }},
        {path: '/all', component: C.terms, name: 'terms'},
        {path: '/edit/:alias', component: C.edit_term, name: 'edit_term'},
    ]
})




export default router;
