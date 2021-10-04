import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [

        {path: '/', redirect: { name: 'category' }},
        {path: '/all', component: C.category, name: 'category'},
        {path: '/:alias/children', component: C.category_child, name: 'category_child'},
    ]
})




export default router;
