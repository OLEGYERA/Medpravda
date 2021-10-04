import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'structures' }},
        {path: '/all', component: C.structures, name: 'structures'},
        {path: '/edit/:alias/main', component: C.edit_structure_main, name: 'edit_structure_main'},
        {path: '/edit/:alias/blocks', component: C.edit_structure_blocks, name: 'edit_structure_blocks'},

    ]
})




export default router;
