import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [
        {path: '/', redirect: { name: 'tags' }},
        {path: '/all', component: C.tags, name: 'tags'},
        {path: '/edit/:alias', component: C.edit_tag, name: 'edit_tag'},
    ]
})




export default router;
