import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'cosmetics' }},
        {path: '/all', component: C.cosmetics, name: 'cosmetics'},
        {path: '/edit/:alias/main', component: C.edit_cosmetic_main, name: 'edit_cosmetic_main'},
        {path: '/edit/:alias/dependency', component: C.edit_cosmetic_dependency, name: 'edit_cosmetic_dependency'},
        {path: '/edit/:alias/instruction', component: C.edit_cosmetic_instruction, name: 'edit_cosmetic_instruction'},
        {path: '/edit/:alias/instruction/ua', component: C.edit_cosmetic_instruction_ua, name: 'edit_cosmetic_instruction_ua'},
        {path: '/edit/:alias/instruction/adaptive', component: C.edit_cosmetic_instruction_adaptive, name: 'edit_cosmetic_instruction_adaptive'},
        {path: '/edit/:alias/instruction/adaptive/ua', component: C.edit_cosmetic_instruction_adaptive_ua, name: 'edit_cosmetic_instruction_adaptive_ua'},
    ]
})




export default router;
