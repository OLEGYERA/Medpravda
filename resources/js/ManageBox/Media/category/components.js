import Vue from 'vue';

const Components = {
    category: Vue.component('category', require('./components/category.vue').default),
    category_child: Vue.component('category_child', require('./components/category_child.vue').default),
}


export default Components;
