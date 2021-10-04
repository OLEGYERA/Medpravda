import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'articles' }},
        {path: '/all', component: C.articles, name: 'articles'},
        {path: '/edit/:alias/main', component: C.edit_article_main, name: 'edit_article_main'},
        {path: '/edit/:alias/dependency', component: C.edit_article_dependency, name: 'edit_article_dependency'},
        {path: '/edit/:alias/instruction', component: C.edit_article_instruction, name: 'edit_article_instruction'},
        {path: '/edit/:alias/instruction/ua', component: C.edit_article_instruction_ua, name: 'edit_article_instruction_ua'},
        {path: '/edit/:alias/instruction/blocks', component: C.edit_article_instruction_blocks, name: 'edit_article_instruction_blocks'},
        {path: '/edit/:alias/instruction/blocks/ua', component: C.edit_article_instruction_blocks_ua, name: 'edit_article_instruction_blocks_ua'},


        // {path: '/edit/:email/editor', component: C.edit_manager_editor, name: 'edit_manager_editor'},
        // {path: '/watch/:alias', component: C.watch_rule, name: 'watch_rule'},
    ]
})




export default router;
