import Vue from 'vue';

const Components = {
    tags: Vue.component('terms', require('./components/tags.vue').default),
    edit_tag: Vue.component('edit-term', require('./components/edit-tag.vue').default),
}


export default Components;
