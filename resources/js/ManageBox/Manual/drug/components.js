import Vue from 'vue';

const Components = {
    drugs: Vue.component('drugs', require('./components/drugs.vue').default),
    edit_drug_main: Vue.component('edit-drug-main', require('./components/edit-drug-main.vue').default),
    edit_drug_dependency: Vue.component('edit-drug-dependency', require('./components/edit-drug-dependency.vue').default),
    edit_drug_instruction: Vue.component('edit-drug-instruction', require('./components/edit-drug-instruction.vue').default),
    edit_drug_instruction_ua: Vue.component('edit-drug-instruction-ua', require('./components/edit-drug-instruction-ua.vue').default),
    edit_drug_instruction_adaptive: Vue.component('edit-drug-instruction-adaptive', require('./components/edit-drug-instruction-adaptive.vue').default),
    edit_drug_instruction_adaptive_ua: Vue.component('edit-drug-instruction-adaptive-ua', require('./components/edit-drug-instruction-adaptive-ua.vue').default),


    // edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;
