import Vue from 'vue';

const Components = {
    cosmetics: Vue.component('cosmetics', require('./components/cosmetics.vue').default),
    edit_cosmetic_main: Vue.component('edit-cosmetic-main', require('./components/edit-cosmetic-main.vue').default),
    edit_cosmetic_dependency: Vue.component('edit-cosmetic-dependency', require('./components/edit-cosmetic-dependency.vue').default),
    edit_cosmetic_instruction: Vue.component('edit-cosmetic-instruction', require('./components/edit-cosmetic-instruction.vue').default),
    edit_cosmetic_instruction_ua: Vue.component('edit-cosmetic-instruction-ua', require('./components/edit-cosmetic-instruction-ua.vue').default),
    edit_cosmetic_instruction_adaptive: Vue.component('edit-cosmetic-instruction-adaptive', require('./components/edit-cosmetic-instruction-adaptive.vue').default),
    edit_cosmetic_instruction_adaptive_ua: Vue.component('edit-cosmetic-instruction-adaptive-ua', require('./components/edit-cosmetic-instruction-adaptive-ua.vue').default),


    // edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;
