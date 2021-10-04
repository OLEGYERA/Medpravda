import Vue from 'vue';

const Components = {
    bad: Vue.component('bad', require('./components/bad.vue').default),
    bad_child: Vue.component('bad_child', require('./components/bad_child.vue').default),
}


export default Components;
