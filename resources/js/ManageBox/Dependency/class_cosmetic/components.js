import Vue from 'vue';

const Components = {
    cosmetic: Vue.component('cosmetic', require('./components/cosmetic.vue').default),
    cosmetic_child: Vue.component('cosmetic_child', require('./components/cosmetic_child.vue').default),
}


export default Components;
