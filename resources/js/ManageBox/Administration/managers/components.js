import Vue from 'vue';

const Components = {
    managers: Vue.component('managers', require('./components/managers.vue').default),
    edit_manager: Vue.component('edit-manager', require('./components/edit-manager.vue').default),
    edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;
