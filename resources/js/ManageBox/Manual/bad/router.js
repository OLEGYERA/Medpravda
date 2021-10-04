import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'bads' }},
        {path: '/all', component: C.bads, name: 'bads'},
        {path: '/edit/:alias/main', component: C.edit_bad_main, name: 'edit_bad_main'},
        {path: '/edit/:alias/dependency', component: C.edit_bad_dependency, name: 'edit_bad_dependency'},
        {path: '/edit/:alias/instruction', component: C.edit_bad_instruction, name: 'edit_bad_instruction'},
        {path: '/edit/:alias/instruction/ua', component: C.edit_bad_instruction_ua, name: 'edit_bad_instruction_ua'},
        {path: '/edit/:alias/instruction/adaptive', component: C.edit_bad_instruction_adaptive, name: 'edit_bad_instruction_adaptive'},
        {path: '/edit/:alias/instruction/adaptive/ua', component: C.edit_bad_instruction_adaptive_ua, name: 'edit_bad_instruction_adaptive_ua'},
    ]
})




export default router;
