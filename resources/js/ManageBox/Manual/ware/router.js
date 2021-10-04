import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'wares' }},
        {path: '/all', component: C.wares, name: 'wares'},
        {path: '/edit/:alias/main', component: C.edit_ware_main, name: 'edit_ware_main'},
        {path: '/edit/:alias/dependency', component: C.edit_ware_dependency, name: 'edit_ware_dependency'},
        {path: '/edit/:alias/instruction', component: C.edit_ware_instruction, name: 'edit_ware_instruction'},
        {path: '/edit/:alias/instruction/ua', component: C.edit_ware_instruction_ua, name: 'edit_ware_instruction_ua'},
        {path: '/edit/:alias/instruction/adaptive', component: C.edit_ware_instruction_adaptive, name: 'edit_ware_instruction_adaptive'},
        {path: '/edit/:alias/instruction/adaptive/ua', component: C.edit_ware_instruction_adaptive_ua, name: 'edit_ware_instruction_adaptive_ua'},
    ]
})




export default router;
