import Vue from 'vue';

const Components = {
    bads: Vue.component('bads', require('./components/bads.vue').default),
    edit_bad_main: Vue.component('edit-bad-main', require('./components/edit-bad-main.vue').default),
    edit_bad_dependency: Vue.component('edit-bad-dependency', require('./components/edit-bad-dependency.vue').default),
    edit_bad_instruction: Vue.component('edit-bad-instruction', require('./components/edit-bad-instruction.vue').default),
    edit_bad_instruction_ua: Vue.component('edit-bad-instruction-ua', require('./components/edit-bad-instruction-ua.vue').default),
    edit_bad_instruction_adaptive: Vue.component('edit-bad-instruction-adaptive', require('./components/edit-bad-instruction-adaptive.vue').default),
    edit_bad_instruction_adaptive_ua: Vue.component('edit-bad-instruction-adaptive-ua', require('./components/edit-bad-instruction-adaptive-ua.vue').default),


    // edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;
