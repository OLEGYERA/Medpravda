import Vue from 'vue';

const Components = {
    rules: Vue.component('rulles', require('./components/rulles.vue').default),
    edit_rule: Vue.component('add-rule', require('./components/edit-rule.vue').default),
    watch_rule: Vue.component('watch', require('./components/watch-rule.vue').default),
}


export default Components;
