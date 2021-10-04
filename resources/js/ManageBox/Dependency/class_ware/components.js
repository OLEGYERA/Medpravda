import Vue from 'vue';

const Components = {
    ware: Vue.component('ware', require('./components/ware.vue').default),
    ware_child: Vue.component('ware_child', require('./components/ware_child.vue').default),
}


export default Components;
