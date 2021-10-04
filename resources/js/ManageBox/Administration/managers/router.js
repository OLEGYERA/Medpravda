import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'managers' }},
        {path: '/all', component: C.managers, name: 'managers'},
        {path: '/edit/:email', component: C.edit_manager, name: 'edit_manager'},
        {path: '/edit/:email/editor', component: C.edit_manager_editor, name: 'edit_manager_editor'},
        // {path: '/watch/:alias', component: C.watch_rule, name: 'watch_rule'},
    ]
})




export default router;
