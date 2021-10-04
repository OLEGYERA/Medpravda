import Vue from 'vue';

const Components = {
    atx: Vue.component('atx', require('./components/atx.vue').default),
    atx_child: Vue.component('atx_child', require('./components/atx_child.vue').default),
}


export default Components;
