import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);




const router = new VueRouter
({
    routes: [
        {path: '/', redirect: { name: 'rules' }},
        {path: '/all', component: C.rules, name: 'rules'},
        {path: '/edit/:alias', component: C.edit_rule, name: 'edit_rule'},
        {path: '/watch/:alias', component: C.watch_rule, name: 'watch_rule'},
    ]
})




export default router;
