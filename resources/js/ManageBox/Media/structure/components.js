import Vue from 'vue';

const Components = {
    structures: Vue.component('structures', require('./components/structures.vue').default),
    edit_structure_main: Vue.component('edit-structure-main', require('./components/edit-structure-main.vue').default),
    edit_structure_blocks: Vue.component('edit-structure-blocks', require('./components/edit-structure-blocks.vue').default),
}


export default Components;
