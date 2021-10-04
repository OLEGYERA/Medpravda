import Vue from 'vue';

const Components = {
    terms: Vue.component('terms', require('./components/terms.vue').default),
    edit_term: Vue.component('edit-term', require('./components/edit-term.vue').default),
}


export default Components;
