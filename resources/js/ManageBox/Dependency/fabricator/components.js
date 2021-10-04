import Vue from 'vue';

const Components = {
    fabricators: Vue.component('fabricators', require('./components/fabricators.vue').default),
    locations: Vue.component('locations', require('./components/locations.vue').default),
}


export default Components;
