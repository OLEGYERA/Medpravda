import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'drugs' }},
        {path: '/all', component: C.drugs, name: 'drugs'},
        {path: '/edit/:alias/main', component: C.edit_drug_main, name: 'edit_drug_main'},
        {path: '/edit/:alias/dependency', component: C.edit_drug_dependency, name: 'edit_drug_dependency'},
        {path: '/edit/:alias/instruction', component: C.edit_drug_instruction, name: 'edit_drug_instruction'},
        {path: '/edit/:alias/instruction/ua', component: C.edit_drug_instruction_ua, name: 'edit_drug_instruction_ua'},
        {path: '/edit/:alias/instruction/adaptive', component: C.edit_drug_instruction_adaptive, name: 'edit_drug_instruction_adaptive'},
        {path: '/edit/:alias/instruction/adaptive/ua', component: C.edit_drug_instruction_adaptive_ua, name: 'edit_drug_instruction_adaptive_ua'},


        // {path: '/edit/:email/editor', component: C.edit_manager_editor, name: 'edit_manager_editor'},
        // {path: '/watch/:alias', component: C.watch_rule, name: 'watch_rule'},
    ]
})




export default router;
