import Vue from 'vue';

const Components = {
    wares: Vue.component('wares', require('./components/wares.vue').default),
    edit_ware_main: Vue.component('edit-ware-main', require('./components/edit-ware-main.vue').default),
    edit_ware_dependency: Vue.component('edit-ware-dependency', require('./components/edit-ware-dependency.vue').default),
    edit_ware_instruction: Vue.component('edit-ware-instruction', require('./components/edit-ware-instruction.vue').default),
    edit_ware_instruction_ua: Vue.component('edit-ware-instruction-ua', require('./components/edit-ware-instruction-ua.vue').default),
    edit_ware_instruction_adaptive: Vue.component('edit-ware-instruction-adaptive', require('./components/edit-ware-instruction-adaptive.vue').default),
    edit_ware_instruction_adaptive_ua: Vue.component('edit-ware-instruction-adaptive-ua', require('./components/edit-ware-instruction-adaptive-ua.vue').default),


    // edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;
